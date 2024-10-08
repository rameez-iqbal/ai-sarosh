<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use App\Models\OurTeamRole;
use App\Serivces\OurTeam\OurTeamInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class OurTeamController extends Controller
{
    public $our_team = null;
    public function __construct( OurTeamInterface $ourTeamInterface )
    {
        $this->our_team = $ourTeamInterface;
    }

    public function index( Request $request )
    {
        if ($request->ajax()) {
            $our_teams = OurTeam::with('category:id,role')->latest()->get();
            return DataTables::of($our_teams)
                ->addIndexColumn()
                ->addColumn('created_at', function($row) {
                    return \Carbon\Carbon::parse($row->created_at)->format('F j, Y');
                })
                ->addColumn('image', function ($row) {
                    if( !is_null($row->image )) {
                        $imageUrl = Storage::url('teams/'.$row->image); // Generate the image URL
                        return '<a href="' . $imageUrl . '" target="_blank">
                            <img src="' . $imageUrl . '" alt="Image" style="border-radius:50%;width:32px;height:32px">
                        </a>';
                    }
                })
                ->addColumn('category', function ($row) {
                    return $row?->category?->role;
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="' . route('our.teams.edit',['id'=>$row->id]) . '" class="edit btn btn-overlay-success btn-icon"><i class="la la-edit"></i></a> |';
                    $btn .= ' <a href="javascript:void(0)"  class="delete btn btn-overlay-danger btn-icon"><i class="la la-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','image','category'])
                ->make(true);
        }
        return view('admin-panel.our-teams.index');
    }

    public function create()
    {
        $our_team_roles = OurTeamRole::get(['id','role']);
        return view('admin-panel.our-teams.create',compact('our_team_roles'));
    }

    public function store( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'designation' => [
                'required',
                'string',
                'max:255'
            ],
            'category' => [
                'required',
                'exists:our_team_roles,id'
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

        $response = $this->our_team->createOrUpdateTeam( $request->except('_token') );
        if(  $response  )
            return apiResponse(true,200,$response);
        else
            return apiResponse(false,403);
    }

    public function destroy($id)
    {
        $response = $this->our_team->deleteTeam( $id );
        return apiResponse($response,200);
    }

    public function edit( $id )
    {
        $our_team = OurTeam::find( $id );
        $our_team_roles = OurTeamRole::get(['id','role']);

        return view('admin-panel.our-teams.edit',compact('our_team','our_team_roles'));   
    }
}
