<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Validation\Rule;
use App\Models\LibraryTypes;
use App\Serivces\Gallery\GalleryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GalleryController extends Controller
{
    public $gallery = null;
    public function __construct( GalleryInterface $galleryInterface )
    {
        $this->gallery = $galleryInterface;
    }

    public function create($type)
    {
        $library_type_id = LibraryTypes::getIdBySlug($type);
        return view('admin-panel.gallery.create', compact('library_type_id'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gallery_id'=>[
                'nullable',
                'exists:galleries,id'
            ],
            'library_type_id' => [
                'required',
                'exists:library_types,id',
            ],
            'type'=>[
                'required',
                Rule::in(['conference', 'workshop']),
            ],
            'heading' => [
                'required',
                'string',
                'max:255'
            ],
            'post_url' => [
                'required_if:type,==,conference',
            ],
            'description' => [
                'required',
            ],
            'banner_images' => [
                'nullable',
                'array'
            ],
            'banner_images.*' => [
                'image',
                'mimes:png,jpg,jpeg,webp,svg',
            ],
            'gallery_images' => [
                'nullable',
                'array',
            ],
            'gallery_images.*' => [
                'image',
                'mimes:png,jpg,jpeg,webp,svg',
            ]
        ]);
        if ($validator->fails()) {
            return apiResponse(false, 403, $validator->errors()->all());
        }
        $response = $this->gallery->createOrUpdateGallery( $request->only('library_type_id','heading','post_url','recording_url','description','banner_images','gallery_images','type','gallery_id') );
        if(  $response  )
            return apiResponse(true,200,$response);
        else
            return apiResponse(false,403);
    }

    public function destroy($id)
    {
        $id = (int)$id;
        $response = $this->gallery->deleteGallery( (int)$id );
        return apiResponse($response,200);
    }

    public function edit( $id )
    {
        $gallery = Gallery::find( (int)$id );
        return view('admin-panel.gallery.edit',compact('gallery','id'));   
    }
}
