@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')
@if(count($obj->getObjectives())>0)
    <section id="objectives" class="pt-80">
        <div class="container">
            <div class="">
                <h1 class="heading text-center mb-2 mb-md-5">Our Objective</h1>
                <div class="row content-row align-items-center g-3 g-md-5">
                    @forelse ($obj->getObjectives() as $objective)
                        <div class="col-12 col-md-6" data-aos="zoom-in-up">
                            <div class="objective-header d-flex align-items-center gap-4">
                                <img src="{{asset('storage/services/'.$objective->image)}}" alt="" class="objective-image">
                                <h3 class="header-heading ff-main ">{{$objective->title}}</h3>
                            </div>
                            <p class="objective-content">{{$objective->description}}</p>
                        </div>
                    @empty
                        <h3>No Objective Found</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endif