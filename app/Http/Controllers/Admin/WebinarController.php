<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\LibraryTypes;
use App\Models\Report;
use App\Models\Video;
use App\Models\Webinar;
use App\Serivces\Webinars\WebinarsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class WebinarController extends Controller
{

    public $webinar_service = null;
    public function __construct(WebinarsInterface $webinarsInterface)
    {
        $this->webinar_service = $webinarsInterface;
    }

    public function index(Request $request, $type)
    {
        switch ($type) {
            case 'webinars':
                if ($request->ajax()) {
                    $webinars = Webinar::with('libraryType:id,type')->latest()->get();
                    return DataTables::of($webinars)
                        ->addIndexColumn()
                        ->addColumn('webinar_date', function ($row) {
                            return \Carbon\Carbon::parse($row->webinar_date)->format('F j, Y');
                        })
                        ->addColumn('image', function ($row) {
                            if (!is_null($row->image)) {
                                $imageUrl = Storage::url('webinars/' . $row->image);
                                return '<a href="' . $imageUrl . '" target="_blank">
                                <img src="' . $imageUrl . '" alt="Image" style="border-radius:50%;width:50px;height:50px">
                            </a>';
                            }
                            return '';  // Return empty string if there's no image
                        })
                        ->addColumn('category', function ($row) {
                            return $row?->libraryType?->type;
                        })
                        ->addColumn('url', function ($row) {
                            return '<a href="' . $row->redirect_url . '" target="_blank" >' . $row->redirect_url . '</a>';
                        })
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . route('webinar.edit', ['id' => $row->id]) . '" class="edit btn btn-overlay-success btn-icon"><i class="la la-edit"></i></a> |';
                            $btn .= ' <a href="javascript:void(0)" class="delete btn btn-overlay-danger btn-icon"><i class="la la-trash"></i></a>';
                            return $btn;
                        })
                        ->rawColumns(['action', 'image', 'category', 'url','webinar_date'])
                        ->make(true);
                }
                return view('admin-panel.webinars.index', compact('type'));
                break;
            case 'articles':
                if ($request->ajax()) {
                    $articles = Article::with('libraryType:id,type')->latest()->get();
                    return DataTables::of($articles)
                        ->addIndexColumn()
                        ->addColumn('article_date', function ($row) {
                            return \Carbon\Carbon::parse($row->article_date)->format('F j, Y');
                        })
                        ->addColumn('image', function ($row) {
                            if (!is_null($row->image)) {
                                $imageUrl = Storage::url('articles/' . $row->image);
                                return '<a href="' . $imageUrl . '" target="_blank">
                                <img src="' . $imageUrl . '" alt="Image" style="border-radius:50%;width:50px;height:50px">
                            </a>';
                            }
                            return '';  // Return empty string if there's no image
                        })
                        ->addColumn('category', function ($row) {
                            return $row?->libraryType?->type;
                        })
                        ->addColumn('url', function ($row) {
                            return '<a href="' . $row->redirect_url . '" target="_blank" >' . $row->redirect_url . '</a>';
                        })
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . route('article.edit', ['id' => $row->id]) . '" class="edit btn btn-overlay-success btn-icon"><i class="la la-edit"></i></a> |';
                            $btn .= ' <a href="javascript:void(0)" class="delete btn btn-overlay-danger btn-icon"><i class="la la-trash"></i></a>';
                            return $btn;
                        })
                        ->rawColumns(['action', 'image', 'category', 'url','article_date'])
                        ->make(true);
                }
                return view('admin-panel.articles.index', compact('type'));
                break;
            case 'videos':
                if ($request->ajax()) {
                    $articles = Video::with('libraryType:id,type')->latest()->get();
                    return DataTables::of($articles)
                        ->addIndexColumn()
                        ->addColumn('image', function ($row) {
                            if (!is_null($row->image)) {
                                $imageUrl = Storage::url('videos/' . $row->image);
                                return '<a href="' . $imageUrl . '" target="_blank">
                                <img src="' . $imageUrl . '" alt="Image" style="border-radius:50%;width:50px;height:50px">
                            </a>';
                            }
                            return '';
                        })
                        ->addColumn('category', function ($row) {
                            return $row?->libraryType?->type;
                        })
                        ->addColumn('iframe_url', function ($row) {
                            return '<a href="' . $row->iframe_url . '" target="_blank" >' . $row->iframe_url . '</a>';
                        })
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . route('video.edit', ['id' => $row->id]) . '" class="edit btn btn-overlay-success btn-icon"><i class="la la-edit"></i></a> |';
                            $btn .= ' <a href="javascript:void(0)" class="delete btn btn-overlay-danger btn-icon"><i class="la la-trash"></i></a>';
                            return $btn;
                        })
                        ->rawColumns(['action', 'image', 'category', 'iframe_url'])
                        ->make(true);
                }
                return view('admin-panel.videos.index', compact('type'));
                break;
            case 'reports':
                if ($request->ajax()) {
                    $articles = Report::with('libraryType:id,type')->latest()->get();
                    return DataTables::of($articles)
                        ->addIndexColumn()
                        ->addColumn('image', function ($row) {
                            if (!is_null($row->image)) {
                                $imageUrl = Storage::url('reports/' . $row->image);
                                return '<a href="' . $imageUrl . '" target="_blank">
                                <img src="' . $imageUrl . '" alt="Image" style="border-radius:50%;width:50px;height:50px">
                            </a>';
                            }
                            return '';
                        })
                        ->addColumn('category', function ($row) {
                            return $row?->libraryType?->type;
                        })
                        ->addColumn('report_file', function ($row) {
                            $filePath = Storage::url('reports/' . $row->report_file); // Adjust the path as needed
                            return '<a href="' . $filePath . '" target="_blank">Report File</a>';
                        })
                        ->addColumn('description', function ($row) {
                            $plainText = strip_tags($row->description,'<b><i><u>'); // Remove HTML tags
                            if(strlen($plainText)<=50) {
                                return $plainText;
                            }else{
                                return substr($plainText, 0, 50) . '...';
                            }
                        })
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . route('report.edit', ['id' => $row->id]) . '" class="edit btn btn-overlay-success btn-icon"><i class="la la-edit"></i></a> |';
                            $btn .= ' <a href="javascript:void(0)" class="delete btn btn-overlay-danger btn-icon"><i class="la la-trash"></i></a>';
                            return $btn;
                        })
                        ->rawColumns(['action', 'image', 'category', 'report_file','description'])
                        ->make(true);
                }
                return view('admin-panel.reports.index', compact('type'));
                break;
            case 'gallery':
                if ($request->ajax()) {
                    $articles = Gallery::with('libraryType:id,type')->latest()->get();
                    return DataTables::of($articles)
                        ->addIndexColumn()
                        ->addColumn('image', function ($row) {
                            if (!is_null($row->image)) {
                                $imageUrl = Storage::url('reports/' . $row->image);
                                return '<a href="' . $imageUrl . '" target="_blank">
                                <img src="' . $imageUrl . '" alt="Image" style="border-radius:50%;width:50px;height:50px">
                            </a>';
                            }
                            return '';
                        })
                        ->addColumn('category', function ($row) {
                            return $row?->libraryType?->type;
                        })
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="' . route('report.edit', ['id' => $row->id]) . '" class="edit btn btn-overlay-success btn-icon"><i class="la la-edit"></i></a> |';
                            $btn .= ' <a href="javascript:void(0)" class="delete btn btn-overlay-danger btn-icon"><i class="la la-trash"></i></a>';
                            return $btn;
                        })
                        ->rawColumns(['action', 'image', 'category', 'report_file','description'])
                        ->make(true);
                }
                return view('admin-panel.gallery.index', compact('type'));
                break;

            default:
                return view('admin-panel.webinars.index', compact('type'));
        }
    }

    public function create($type)
    {
        $library_type_id = LibraryTypes::getIdBySlug($type);
        return view('admin-panel.webinars.create', compact('library_type_id'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'redirect_url' => [
                'required',
                'string',
                'max:255',
                'regex:/^https:\/\/.+$/'
            ],
            'webinar_date'=>[
                'required',
                'date'
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
        $response = $this->webinar_service->createOrUpdateWebinars($request->except('_token'));
        if ($response)
            return apiResponse(true, 200, $response);
        else
            return apiResponse(false, 403);
    }

    public function destroy($id)
    {
        $response = $this->webinar_service->deleteWebinars($id);
        return apiResponse($response, 200);
    }

    public function edit($id)
    {
        $webinar = Webinar::find($id);
        return view('admin-panel.webinars.edit', compact('webinar'));
    }

}
