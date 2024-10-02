<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Serivces\Projects\ProjectInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public $project = null;
    public function __construct(ProjectInterface $projectInterface)
    {
        $this->project = $projectInterface;
    }

    public function create()
    {
        $countries = Country::all(['id', 'name']);
        return view('admin-panel.projects.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'university' => 'required',
            'pi' => 'required',
            'co_pi' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'project_team' => 'required',
            'url' => 'required',
            'country_id' => 'required|exists:countries,id',
            'description' => 'required',
            'logo' => 'required|mimes:png,svg,webp,jpg,jpeg',
            'image' => 'required|mimes:png,svg,webp,jpg,jpeg',
            'detail_image' => 'required|mimes:png,svg,webp,jpg,jpeg',
        ]);
        if ($validator->fails())
            return apiResponse(false, 403, $validator->errors()->all());
        $data = [];
        $data =
            [
                'project_id' => $request->input('project_id'),
                'title' => $request->input('title'),
                'university' => $request->input('university'),
                'pi' => $request->input('pi'),
                'co_pi' => $request->input('co_pi'),
                'start_time' => $request->input('start_time'),
                'end_time' => $request->input('end_time'),
                'project_team' => $request->input('project_team'),
                'url' => $request->input('url'),
                'country_id' => $request->input('country_id'),
                'description' => $request->input('description'),
                'logo' => $request->file('logo'),
                'image' => $request->file('image'),
                'detail_image' => $request->file('detail_image'),
            ];
        $response = $this->project->createOrUpdateProject($data);
        if ($response)
            return apiResponse(true, 200, $response);
        else
            return apiResponse(false, 403);
    }
}
