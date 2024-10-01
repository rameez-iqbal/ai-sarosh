<div class="breadcrumb breadcrmb my-3" data-aos="fade-up-right">
    @if($backLink)
        <img src="{{ asset('app-assets/images/frontend/back.svg') }}" alt="Back">
        <a href="{{ $backLink['href'] }}" class="mb-0 fw-bold back">{{ $backLink['text'] }}</a>
    @endif
    <p class="mb-0 fw-light">{{ $homeText }}</p>
    @if(count($breadcrumbItems) > 0)
        <img src="{{ asset('app-assets/images/frontend/arrow_right_blue.svg') }}" alt="Arrow Right">
        @foreach($breadcrumbItems as $index => $item)
            <p class="mb-0 fw-light items {{ $index === count($breadcrumbItems)-1 ? 'underline' : '' }}">{{ $item['text'] }}</p>
            @if($index < count($breadcrumbItems) - 1)
                <img src="{{ asset('app-assets/images/frontend/arrow_right_blue.svg') }}" alt="Arrow Right">
            @endif
        @endforeach
    @endif
</div>
