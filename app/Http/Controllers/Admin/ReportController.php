<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LibraryTypes;
use App\Models\Report;
use App\Serivces\Reports\ReportInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public $report_service = null;
    public function __construct(ReportInterface $reportInterface)
    {
        $this->report_service = $reportInterface;
    }

    public function create($type)
    {
        $library_type_id = LibraryTypes::getIdBySlug($type);
        return view('admin-panel.reports.create', compact('library_type_id'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'organization' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'required',
                'string',
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
            'report_file' => [
                'required',
                'mimes:png,jpg,jpeg,webp,svg,pdf,doc,docx'
            ],
        ]);
        if ($validator->fails()) {
            return apiResponse(false, 403, $validator->errors()->all());
        }
        $response = $this->report_service->createOrUpdateReport($request->only('title','organization','description','library_type_id','image','report_file','report_id'));
        if ($response)
            return apiResponse(true, 200, $response);
        else
            return apiResponse(false, 403);
    }

    public function destroy($id)
    {
        $response = $this->report_service->deleteReport($id);
        return apiResponse($response, 200);
    }

    public function edit($id)
    {
        $report = Report::find($id);
        return view('admin-panel.reports.edit', compact('report'));
    }
}
