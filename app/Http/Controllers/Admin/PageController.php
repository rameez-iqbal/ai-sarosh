<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Serivces\Page\PageInterface;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public $page_service = null;
    public function __construct( PageInterface $pageInterface )
    {
        $this->page_service = $pageInterface;
    }

    public function index ( Request $request )
    {
        if ($request->ajax()) {
            $pages = Page::where('type','section')->latest()->get();
            return DataTables::of($pages)
                ->addIndexColumn()
                ->addColumn('created_at', function($row) {
                    return \Carbon\Carbon::parse($row->created_at)->format('F j, Y');
                })
                ->addColumn('image', function ($row) {
                    if( !is_null($row->image )) {
                        $imageUrl = Storage::url('home/'.$row->image); // Generate the image URL
                        return '<a href="' . $imageUrl . '" target="_blank">
                            <img src="' . $imageUrl . '" alt="Image" style="border-radius:50%;width:32px;height:32px">
                        </a>';
                    }
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="' . route('page.edit',['id'=>$row->id]) . '" class="edit btn btn-overlay-success btn-icon"><i class="la la-edit"></i></a>';
                    $btn .= ' <a href="javascript:void(0)"  class="delete btn btn-overlay-danger btn-icon"><i class="la la-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','image'])
                ->make(true);
        }
        return view('admin-panel.pages.index');   
    }

    public function create()
    {
        return view('admin-panel.pages.create');   

    }

    public function storeUpdatePage( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'page' => [
                'required_if:type,page', // Only required if 'type' is 'page'
                'string',
                'max:255'
            ],
            'heading' => [
                'required_if:type,page', // Only required if 'type' is 'page'
                'string',
                'max:255'
            ],
            'description'=>'required|string',
            'page_id'=>'exists:pages,id',
            'type'=>'required'
        ]);
        if (!$request->has('page_id')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048';
        } else {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048';
        }
        if($validator->fails()){
            return apiResponse(false,403, $validator->errors()->all());
        }
        $response = $this->page_service->createOrUpdatePage( $request->except('_token') );
        if(  $response  )
            return apiResponse(true,200,$response);
        else
            return apiResponse(false,403);

    }

    public function destroy($id)
    {
        $response = $this->page_service->deletePage( $id );
        return apiResponse($response,200);
    }

    public function edit( $id )
    {
        $page = Page::find( $id );
        return view('admin-panel.pages.edit',compact('page'));   
    }
}
