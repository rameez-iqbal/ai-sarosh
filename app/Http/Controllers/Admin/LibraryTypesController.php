<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LibraryTypes;
use App\Serivces\Library\LibraryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class LibraryTypesController extends Controller
{
    
    public $library = null;
    public function __construct( LibraryInterface $libraryInterface )
    {
        $this->library = $libraryInterface;
    }

    public function index( Request $request )
    {
        if ($request->ajax()) {
            $libraries = LibraryTypes::latest()->get();
            return DataTables::of($libraries)
                ->addIndexColumn()
                ->addColumn('created_at', function($row) {
                    return \Carbon\Carbon::parse($row->created_at)->format('F j, Y');
                })
                ->addColumn('image', function ($row) {
                    if( !is_null($row->image )) {
                        $imageUrl = Storage::url('library/'.$row->image); // Generate the image URL
                        return '<a href="' . $imageUrl . '" target="_blank">
                            <img src="' . $imageUrl . '" alt="Image" style="border-radius:50%;width:32px;height:32px">
                        </a>';
                    }
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="' . route('library.edit',['id'=>$row->id]) . '" class="edit btn btn-overlay-success btn-icon"><i class="la la-edit"></i></a> |';
                    $btn .= ' <a href="javascript:void(0)"  class="delete btn btn-overlay-danger btn-icon"><i class="la la-trash"></i></a>|';
                    $btn .= ' <a href="'.route('webinar',['type'=>$row->slug]).'"  class="btn btn-overlay-info btn-icon"><i class="la la-plus"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','image'])
                ->make(true);
        }
        return view('admin-panel.library.index');
    }

    public function create()
    {
        return view('admin-panel.library.create');
    }

    public function store( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'type' => [
                'required',
                'string',
                'max:255'
            ],
            'image' => [
                'required',
                'image',
                'mimes:png,jpg,jpeg,webp,svg'
            ],
        ]);
        if($validator->fails()){
            return apiResponse(false,403, $validator->errors()->all());
        }

        $response = $this->library->createOrUpdateLibrary( $request->except('_token') );
        if(  $response  )
            return apiResponse(true,200,$response);
        else
            return apiResponse(false,403);
    }

    public function destroy($id)
    {
        $response = $this->library->deleteLibrary( $id );
        return apiResponse($response,200);
    }

    public function edit( $id )
    {
        $library = LibraryTypes::find( $id );
        return view('admin-panel.library.edit',compact('library'));   
    }
}
