<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurClient;
use App\Trait\Image;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;


class OurClientController extends Controller
{
    use Image;
    public function index( Request $request )
    {
        if ($request->ajax()) {
            $pages = OurClient::latest()->get();
            return DataTables::of($pages)
                ->addIndexColumn()
                ->addColumn('created_at', function($row) {
                    return \Carbon\Carbon::parse($row->created_at)->format('F j, Y');
                })
                ->addColumn('image', function ($row) {
                    if( !is_null($row->image )) {
                        $imageUrl = asset('storage/ourclients/'.$row->image); // Generate the image URL
                        return '<a href="' . $imageUrl . '" target="_blank">
                            <img src="' . $imageUrl . '" alt="Image" style="border-radius:50%;width:32px;height:32px">
                        </a>';
                    }
                })
                ->addColumn('description', function($row) {
                    $description = $row->description;
                    $maxLength = 100;
                    if (strlen($description) > $maxLength) {
                        $description = substr($description, 0, $maxLength) . '...';
                    }
                    return $description;
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="' . route('our.clients.edit',['id'=>$row->id]) . '" class="edit btn btn-overlay-success btn-icon"><i class="la la-edit"></i></a> |';
                    $btn .= ' <a href="javascript:void(0)"  class="delete btn btn-overlay-danger btn-icon"><i class="la la-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','image','description'])
                ->make(true);
        }
        return view('admin-panel.our-client.index');
    }

    public function create()
    {
        return view('admin-panel.our-client.create');
    }

    public function store( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'description' => [
                'required',
                'string',
                'max:255'
            ],
            'image' => [
                'required',
                'image',
                'mimes:png,jpg,jpeg,webp,svg',
                'max:10240',
            ],
        ]);
        if($validator->fails()){
            return apiResponse(false,403, $validator->errors()->all());
        }
        try 
        {
            if( array_key_exists('our_client_id',$request->all()) )
            {
                $our_client = OurClient::find($request->input('our_client_id'));
                if( $our_client->image !=  $request->file('image')->getClientOriginalName())
                    $this->deleteImage( $our_client->image,OurClient::PATH );
            }
            else
                $our_client = new OurClient();
            $our_client->image = ($our_client->image !=  $request->file('image')->getClientOriginalName()) ? $this->storeImage($request->file('image'), 'ourclients') : $our_client->image;
            $our_client->description = $request->input('description');
            $our_client->save();
            if(  !is_null( $our_client )  )
            return apiResponse(true,200,$our_client);
            else
                return apiResponse(false,403);
        } catch (Exception $ex) {
            Log::info("Our CLient store => ".$ex->getMessage());
        }
    }

    public function destroy( $id )
    {
        $id = (int)$id;
        $our_client = OurClient::find( $id );
        if( $our_client )
        {
            $this->deleteImage( $our_client->image,OurClient::PATH );
            $our_client->delete();
            return apiResponse(true,200);
        }
        return apiResponse(false,403);
    }

    public function edit( $id )
    {
        $our_client = OurClient::find( (int)$id );
        return view('admin-panel.our-client.edit',compact('our_client'));   
    }
}
