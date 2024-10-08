<header class="header header-fixed header-light">
    <div class="header-middle">
        <div class="logo-color logo-color-light">
            <div class="logo">
                <div class="logo-middle">
                    <a class="font-xll font-monospace" href="{{route('pages')}}"
                       style="color:#251e43 !important;text-decoration: none"><img
                                style="height: 60px !important;" src="{{asset('app-assets')}}/images/logo.png"
                                alt="Logo"> AI-Sarosh</a>
                </div>
            </div>
        </div>
        <div class="header-topbar">
            <div class="topbar-left">
                <a class="side-toggle" href="#!">
                    <i class="la la-bars"></i>
                </a>
            </div>
            <div class="topbar-right">
                <ul>
                    <li class="dropdown show setting">

                    <li class="dropdown show user-profile">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <div class="avatar avatar-sm mr-1" id="user_profile_img">
                                <img class="img-fluid" src="{{asset('app-assets')}}/images/team/01.jpg" alt="">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"
                             style="position:absolute;transform:translate3d(-261px, 18px, 0px);will-change:transform">
                            <div class="profile-pic">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="profile-name">
                                            <h4>{{auth()->user()->full_name}}</h4>
                                            <a href="#">{{auth()->user()->email}}</a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="avatar mr-1">
                                            <img class="img-fluid" src="{{asset('app-assets')}}/images/team/03.jpg"
                                                 alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-info">
                                {{-- <a class="dropdown-item" href="#"> <i class="la la-edit"></i>  My Profile </a>
                                <div class="separator my-2"></div>
                                <a class="dropdown-item" href="#"> <i class="la la-cog"></i> Change Password </a> --}}
                                <form action="{{route('logout')}}" method="post">
                                    <button class="btn btn-outline-primary outline-gray btn-sm mt-3"><i
                                                class="la la-power-off"></i> Logout
                                    </button>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>