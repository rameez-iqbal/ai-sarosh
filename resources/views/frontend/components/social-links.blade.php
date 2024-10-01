
@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')
<section id="social-links" >
    <div class="social-icons d-flex justify-content-end" data-aos="fade-left">
        <a href="{{json_decode($obj->getSettings()->social_url)->fb_url}}" target="_blank"> <img src="{{ url('app-assets') }}/images/frontend/fb.svg" data-src="{{ url('app-assets') }}/images/frontend/fb.svg" alt=""></a>
        <a href="{{json_decode($obj->getSettings()->social_url)->insta_url}}" target="_blank"> <img src="{{ url('app-assets') }}/images/frontend/insta.svg" data-src="{{ url('app-assets') }}/images/frontend/insta.svg" alt=""></a>
        <a href="{{json_decode($obj->getSettings()->social_url)->youtube_url}}" target="_blank"> <img src="{{ url('app-assets') }}/images/frontend/youtube.svg" data-src="{{ url('app-assets') }}/images/frontend/youtube.svg" alt=""></a>
        <a href="{{json_decode($obj->getSettings()->social_url)->linkedin_url}}" target="_blank"> <img src="{{ url('app-assets') }}/images/frontend/linkedin.svg" data-src="{{ url('app-assets') }}/images/frontend/linkedin.svg" alt=""></a>
    </div>
</section>