<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryHighlights;
use App\Serivces\GalleryHighlights\GalleryHighlightsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class GalleryHighlightsController extends Controller
{
    public $galleryHighlight = null;
    public function __construct( GalleryHighlightsInterface $galleryHighlightsInterface )
    {
        $this->galleryHighlight = $galleryHighlightsInterface;
    }

    public function index(Request $request,$id)
    {
        if ($request->ajax()) {
            $btn = '';
            $articles = GalleryHighlights::with('gallery:id,heading')->latest()->get();
            return DataTables::of($articles)
                ->addIndexColumn()
                ->addColumn('images', function ($row) {
                    if (!is_null($row->images)) {
                        $imageUrl = Storage::url('highlights/'.json_decode($row->images)[0]);
                        return '<a href="' . $imageUrl . '" target="_blank">
                        <img src="' . $imageUrl . '" alt="Image" style="border-radius:50%;width:32px;height:32px">
                        </a>';
                    }
                    return '';
                })
                ->addColumn('gallery', function ($row) {
                    return $row?->gallery?->heading;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('highlights.edit', ['id' => $row->id]) . '" class="edit btn btn-overlay-success btn-icon"><i class="la la-edit"></i></a> |';
                    $btn .= ' <a href="javascript:void(0)" class="delete btn btn-overlay-danger btn-icon"><i class="la la-trash"></i></a>';
                    if($row->type == 'workshop') {
                        $btn .= ' | <a href="javascript:void(0)" class="btn btn-overlay-info btn-icon"><i class="fa fa-calendar-o"></i></a>';
                        $btn.='';
                    }
                    return $btn;
                })
                ->rawColumns(['action', 'banner_image', 'gallery','description','images'])
                ->make(true);
        }
        return view('admin-panel.gallery.workshops',compact('id'));
    }

    public function create($id)
    {
        // $library_type_id = LibraryTypes::getIdBySlug($type);
        return view('admin-panel.gallery.workshop-create', compact('id'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'days' => 'required|array', // Ensure 'days' is an array
            'days.*.id' => 'required|integer|exists:galleries,id', // Each 'id' should be an integer
            'days.*.day' => 'required|string', // Each 'day' should be a string
            'days.*.heading' => 'required|string|max:255', // Each 'heading' should be a string with max length of 255
            'days.*.images' => 'required|array', // Ensure 'images' is an array
            'days.*.images.*' => 'image|mimes:jpg,jpeg,png,svg,webp|max:10240', // Each image should be a valid image file with max size of 20MB
            'days.images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        if ($validator->fails()) {
            return apiResponse(false, 403, $validator->errors()->all());
        }
        $response  = $this->galleryHighlight->createOrUpdateGalleryHighlights($request->except('_token'));
        if( $response == true )
            return apiResponse(true,200,$response);
        else
            return apiResponse(false,403);
    }

    public function destroy($id)
    {
        $id = (int)$id;
        $response = $this->galleryHighlight->deleteGalleryHighlights( $id );
        return apiResponse($response,200);
    }

    public function edit( $id )
    {
        $workshop = GalleryHighlights::find( (int)$id );
        return view('admin-panel.gallery.workshop-edit',compact('workshop','id'));   
    }
}
