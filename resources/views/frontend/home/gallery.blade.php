@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')
<div>
<section class="my-2 my-md-5">
    <div class="container">
        <div class="row text-center text-lg-start g-2">
            @if(!is_null($obj->getRandomGalleryImages()))
                @forelse($obj->getRandomGalleryImages() as $gallery_img)
                    <div class="col-lg-3 col-md-4 col-6 img-div" data-img="{{ asset('storage/gallery/'.$gallery_img)}}"  data-aos="zoom-in-up">
                        <a href="javascript:void(0)" class="d-block h-100">
                            <div class="img-container">
                                <img class="img-fluid img-responsive" src="{{ asset('storage/gallery/'.$gallery_img)}}"
                                    alt="">
                            </div>
                        </a>
                    </div>
                @empty
                    <h3>NO Gallery Image Found</h3>
                @endforelse
            @endif

        </div>
    </div>

</section>
</div>