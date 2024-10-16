@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')

<header id="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand brand-logo" href="{{route('homepage')}}">
                @if(!is_null($obj->getSettings()))
                    <img src="{{ asset('storage/setting/'.$obj->getSettings()->logo)}}" alt="Logo" 
                         data-src="{{ asset('storage/setting/'.$obj->getSettings()->logo)}}" class="d-inline-block align-text-top logo">
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto custom-nav">
                    <li class="nav-item"><a class="nav-link text-white" href="{{route('homepage')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{route('aboutUs')}}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{route('project')}}">Our Work</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{route('team')}}">Our Team</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Library</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('library')}}">Library</a></li>
                            <li><a class="dropdown-item" href="{{route('webinars')}}">Webinars</a></li>
                            <li><a class="dropdown-item" href="{{route('reports')}}">Reports</a></li>
                            <li><a class="dropdown-item" href="{{route('gallery')}}">Gallery</a></li>
                            <li><a class="dropdown-item" href="{{route('videos')}}">Videos</a></li>
                            <li><a class="dropdown-item" href="{{route('articles')}}">Articles</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{route('contact-us')}}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
