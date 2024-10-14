<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LibraryTypes;
use App\Models\Video;
use App\Serivces\Videos\VideoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public $video_service = null;
    public function __construct(VideoInterface $videoInterface)
    {
        $this->video_service = $videoInterface;
    }

    public function create($type)
    {
        $library_type_id = LibraryTypes::getIdBySlug($type);
        return view('admin-panel.videos.create', compact('library_type_id'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'organization' => [
                'required',
                'string',
                'max:255'
            ],
            'video' => [
                'nullable',
                'file',
                'mimes:mp4'
            ],
            'library_type_id' => [
                'nullable',
                'integer',
                'exists:library_types,id',
            ],
            'image' => [
                'required',
                'image',
                'mimes:png,jpg,jpeg,webp,svg'
            ],
        ]);
        if ($validator->fails()) {
            return apiResponse(false, 403, $validator->errors()->all());
        }
        $response = $this->video_service->createOrUpdateVideo($request->except('_token'));
        if ($response)
            return apiResponse(true, 200, $response);
        else
            return apiResponse(false, 403);
    }

    public function destroy($id)
    {
        $response = $this->video_service->deleteVideo($id);
        return apiResponse($response, 200);
    }

    public function edit($id)
    {
        $video = Video::find($id);
        return view('admin-panel.videos.edit', compact('video'));
    }
}
