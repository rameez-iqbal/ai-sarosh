<div class="{{$columns}}" data-aos="zoom-in-up">
    <div class="libraries d-flex flex-column align-items-center gap-3">
        <img src="{{is_null($bannerImage) ? $image : $bannerImage}}" class="w-100 h-100 {{$isGallery == true ? 'gallery_image' : ''}}" alt="no-image" style="border-radius: {{$borderRadius}}">
        <a href="{{$href!='#' ? route('gallery.conferences',['slug'=>$href]) : '#'}}" class="main-btn">{{$name}}</a>
    </div>
</div>
            
