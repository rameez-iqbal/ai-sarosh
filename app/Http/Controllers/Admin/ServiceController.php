<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Serivces\ThematicServices\ThematicInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public $thematic_service = null;
    public function __construct( ThematicInterface $thematicInterface )
    {
        $this->thematic_service = $thematicInterface;
    }
    public function index( Request $request )
    {
        if ($request->ajax()) {
            $pages = Service::latest()->get();
            return DataTables::of($pages)
                ->addIndexColumn()
                ->addColumn('created_at', function($row) {
                    return \Carbon\Carbon::parse($row->created_at)->format('F j, Y');
                })
                ->addColumn('image', function ($row) {
                    if( !is_null($row->image )) {
                        $imageUrl = asset('storage/services/' . $row->image);
                        return '<a href="' . $imageUrl . '" target="_blank">
                            <img src="' . $imageUrl . '" alt="Image" style="border-radius:50%;width:32px;height:32px">
                        </a>';
                    }
                })
                ->addColumn('type', function ($row) {
                    if( $row->type == 'thematic_area' ) {
                        return "Thematic Area";
                    }else {
                        return "Service";
                    }
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="' . route('service.edit',['id'=>$row->id]) . '" class="edit btn btn-overlay-success btn-icon"><i class="la la-edit"></i></a>';
                    $btn .= ' <a href="javascript:void(0)"  class="delete btn btn-overlay-danger btn-icon"><i class="la la-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','image','type'])
                ->make(true);
        }
        return view('admin-panel.services.index');   
    }
    public function create()
    {
        return view('admin-panel.services.create');   

    }

    public function storeUpdateService( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'required',
                'string'
            ],
            'image' => [
                'required',
                'image',
                // 'mimes:jpeg,png,jpg,webp,svg|max:2048'
            ]
        ]);
        if($validator->fails()){
            return apiResponse(false,403, $validator->errors()->all());
        }
        $response = $this->thematic_service->createOrUpdateService( $request->except('_token') );
        if(  $response  )
            return apiResponse(true,200,$response);
        else
            return apiResponse(false,403);

    }

    public function destroy($id)
    {
        $response = $this->thematic_service->deleteService( $id );
        return apiResponse($response,200);
    }

    public function edit( $id )
    {
        $service = Service::find( $id );
        return view('admin-panel.services.edit',compact('service'));   
    }

}
