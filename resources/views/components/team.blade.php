<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="heading mb-5 fw-bold">{{ $title }}</h2>
            </div>
            <div class="col-md-12 leaderships pr-md-0 pl-md-0">
                <div class="row p-4 g-4 justify-content-center leadership-card w-{{$width}}" style="background-color: {{ $bgColor }}">
                        @foreach($leaders as $leader)
                            <div class="{{$columns}}" data-aos="zoom-in-up">
                                <div class="text-center">
                                    <img src="{{ $leader['profileImg'] }}" alt="Leader Image">
                                </div>
                                <div class="mt-2">
                                    <p class="mb-0 name ff-main main-color fw-normal text-center fw-bold">{{ $leader['leaderName'] }}</p>
                                    <p class="mb-0 role ff-main main-color fw-normal text-center">{{ $leader['designation'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</section>
