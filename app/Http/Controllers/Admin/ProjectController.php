<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Project;
use App\Serivces\Projects\ProjectInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public $project = null;
    public function __construct(ProjectInterface $projectInterface)
    {
        $this->project = $projectInterface;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $project = Project::with('details')->latest()->get();
            return DataTables::of($project)
                ->addIndexColumn()
                ->addColumn('created_at', function($row) {
                    return \Carbon\Carbon::parse($row->created_at)->format('F j, Y');
                })
                ->addColumn('image', function ($row) {
                    if( !is_null($row->image )) {
                        $imageUrl = Storage::url('projects/'.$row->image); // Generate the image URL
                        return '<a href="' . $imageUrl . '" target="_blank">
                            <img src="' . $imageUrl . '" alt="Image" style="border-radius:50%;width:50%;height:50%">
                        </a>';
                    }
                })
                ->addColumn('url', function ($row) {
                    return '<a href="' . $row?->details?->url . '" target="_blank" >' . $row?->details?->url . '</a>';
                })
                ->addColumn('timeline',function($row){
                    return $row?->details?->timeline;
                })
                ->addColumn('title',function($row){
                    return truncateText($row->title,10);
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="' . route('project.edit',['id'=>$row->id]) . '" class="edit btn btn-overlay-success btn-icon"><i class="la la-edit"></i></a>';
                    $btn .= ' <a href="javascript:void(0)"  class="delete btn btn-overlay-danger btn-icon"><i class="la la-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','image','url','title'])
                ->make(true);
        }
        return view('admin-panel.projects.index');
    }

    public function create()
    {
        $countries = Country::all(['id', 'name']);
        return view('admin-panel.projects.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id'=>'nullable|exists:projects,id',
            'name'=>'required',
            'title' => 'required',
            'university' => 'required',
            'logo' => 'required|mimes:png,svg,webp,jpg,jpeg',
            'image' => 'required|mimes:png,svg,webp,jpg,jpeg',
            'pi' => 'required',
            'co_pi' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
            'project_team' => 'required',
            'url' => 'required',
            'country_id' => 'required|exists:countries,id',
            'description' => 'required',
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
                'logo' => $request->file('logo'),
                'image' => $request->file('image'),
                'pi' => $request->input('pi'),
                'co_pi' => $request->input('co_pi'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'project_teams' => $request->input('project_team'),
                'url' => $request->input('url'),
                'country_id' => $request->input('country_id'),
                'about_description' => $request->input('description'),
                'detail_image' => $request->file('detail_image'),
                'name' => $request->input('name'),
            ];
        $response = $this->project->createOrUpdateProject($data);
        if ($response)
            return apiResponse(true, 200, $response);
        else
            return apiResponse(false, 403);
    }

    public function edit($id)
    {
        $id = (int)$id;
        $project = Project::with('details')->find($id);
        $countries = Country::all(['id', 'name']);
        return view('admin-panel.projects.edit', compact('countries','project'));
    }

    public function destroy($id)
    {
        $response = $this->project->deleteProject( $id );
        return apiResponse($response,200);
    }
}
