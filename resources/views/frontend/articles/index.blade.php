@extends('frontend.layout.master')
@section('page-title', 'Articles')
@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
    </div>
    @inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')

    <section id="articles" class="my-4 my-md-5">
        <div class="container">
            <div class="row my-3 my-md-5">
                <h1 class="ff-main text-center main-color fw-bold">Articles</h1>
            </div>
            <div class="row g-3">

                @foreach($obj->getArticles() as $article)
                <x-horizental-card
                    :image="asset('storage/articles/'.$article->image)"
                    :href="$article['redirect_url']"
                    :title="$article['title']"
                    :owner="$article['sub_title']"
                    :date="editDateYear($article['article_date'])"
                    imageCol="col-md-3"
                    textCol="col-md-6"
                    type="article"
                    />
                @endforeach
            </div>
        </div>
    </section>
@endsection
