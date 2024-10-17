@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')
@if(!is_null($obj->donor()))
<section class="my-2 my-md-5" id="about-donor">
    <div class="container" data-aos="zoom-in-up">
        <div class="row">
            <div class="col-md-12">
                <h3  class="heading text-center pt-5">{{$obj->donor() ? $obj->donor()->heading : ''}}</h3>
            </div>
        </div>
        @if(!is_null($obj->donor()))
            <div class="row about-donner-content pb-5 p-x-2">
                <div class="col-md-11">
                    <div class="donner-image text-center">
                        <img src="{{ asset('storage/home/'.$obj->donor()->image) }}" alt="" class="w-sm-100">
                    </div>
                    <?php
                        $formattedText = preg_replace("/\r\n|\r|\n+/", "\n", $obj->donor() ? $obj->donor()->description : '');
                    ?>
                    <p class="text">{!! nl2br(e($formattedText)) !!}</p>
                </div>
            </div>
        @endif

    </div>
</section>
@endif