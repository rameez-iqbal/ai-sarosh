@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')
@if(count($obj->ourClients())>0)
<section id="partners" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="heading text-center mb-0 my-2 my-md-0">Implementing Partners</p>
            </div>
        </div>
        <div class="row my-2 my-md-5 justify-content-between px-0 px-md-5" id="partners-row">
            @forelse ($obj->ourClients() as $key=>$ourClient)
                <div class="col-md-5 {{ $key==1 ? 'set-partner-margin-top' : '' }}" data-aos="zoom-in-up">
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