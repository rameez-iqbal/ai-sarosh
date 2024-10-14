@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')

<header id="header">
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand brand-logo" href="{{route('homepage')}}">
                @if(!is_null($obj->getSettings()))
                    <img src="{{ asset('storage/setting/'.$obj->getSettings()->logo)}}" alt="Logo" data-src="{{ asset('storage/setting/'.$obj->getSettings()->logo)}}"
                        class="d-inline-block align-text-top logo">
                @endif
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto custom-nav">
                    {{-- @forelse ($obj->getPages() as $page)
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="{{$page->slug}}">{{$page->name}}</a>
                        </li>
                    @empty
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="#">Home</a>
                        </li>
                    @endforelse --}}
                    <li class="nav-link text-white px-2 px-md-0"><a href="{{route('homepage')}}" class="text-white">Home</a></li>
                    <li class="nav-link text-white px-2 px-md-0"><a href="{{route('aboutUs')}}">About Us</a> </li>
                    <li class="nav-link text-white px-2 px-md-0"><a href="{{route('project')}}">Our Work</a></li>
                    <li class="nav-link text-white px-2 px-md-0"><a href="{{route('team')}}">Our Team</a></li>
                    <li class="nav-item text-white px-2 px-md-0 dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Library
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <li><a class="dropdown-item" href="{{route('library')}}">Library</a></li>
                          <li><a class="dropdown-item" href="{{route('webinars')}}">Webinars</a></li>
                          <li><a class="dropdown-item" href="{{route('reports')}}">Reports</a></li>
                          <li><a class="dropdown-item" href="{{route('gallery')}}">Gallery</a></li>
                          <li><a class="dropdown-item" href="{{route('videos')}}">Videos</a></li>
                          <li><a class="dropdown-item" href="{{route('articles')}}">Articles</a></li>
                        </ul>
                    </li>
                    <li class="nav-link text-white px-2 px-md-0"><a href="{{route('contact-us')}}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    
</header>
