@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')
@if(count($obj->ourClients())>0)
<section id="partners">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="heading text-center mb-0">Implementing Partners</p>
            </div>
        </div>
        <div class="row my-5" id="partners-row">
            @forelse ($obj->ourClients() as $key=>$ourClient)
                <div class="col-md-5 @if($key%2!=0) offset-md-2 @endif" data-aos="zoom-in-up">
                    <div class="partner-image text-center"><img src="{{asset('storage/ourclients/' . $ourClient->image) }}" alt=""></div>
                    <div class="partner-description">
                        <p class="text">{{$ourClient->description}}</p>
                    </div>
                </div>
            @empty
                <h3>No Partner Found</h3>
            @endforelse
            
        </div>
    </div>
</section>
@endif