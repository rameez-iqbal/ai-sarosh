<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\LibraryTypes;
use App\Serivces\Articles\ArticlesInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public $articles = null;
    public function __construct(ArticlesInterface $articlesInterface)
    {
        $this->articles = $articlesInterface;
    }

    public function create($type)
    {
        $library_type_id = LibraryTypes::getIdBySlug($type);
        return view('admin-panel.articles.create', compact('library_type_id'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'sub_title' => [
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
            'article_date'=>[
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
        $response = $this->articles->createOrUpdateArticle($request->except('_token'));
        if ($response)
            return apiResponse(true, 200, $response);
        else
            return apiResponse(false, 403);
    }

    public function destroy($id)
    {
        $response = $this->articles->deleteArticle($id);
        return apiResponse($response, 200);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin-panel.articles.edit', compact('article'));
    }
}
