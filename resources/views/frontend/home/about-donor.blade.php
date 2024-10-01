@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')
<section class="my-5" id="about-donor">
    <div class="container" data-aos="zoom-in-up">
        <div class="row">
            <div class="col-md-12">
                <h3  class="heading text-center pt-4">{{$obj->donor()->heading}}</h3>
            </div>
        </div>
        <div class="row about-donner-content pb-3">
            <div class="col-md-12">
                <div class="donner-image text-center">
                    <img src="{{ asset('storage/home/' . $obj->donor()->image) }}" alt="" class="w-sm-100">
                </div>
                <?php
                    $formattedText = preg_replace("/\r\n|\r|\n+/", "\n", $obj->donor()->description);
                ?>
                <p class="text">{!! nl2br(e($formattedText)) !!}</p>

    
            </div>
        </div>

    </div>
</section>