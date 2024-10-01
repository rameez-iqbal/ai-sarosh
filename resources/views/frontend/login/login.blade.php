<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from infinitysoftway.com/oxoury/login-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 05:52:20 GMT -->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Infinitysoftway" />
        <meta name="description" content="statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- TITLE -->
        <title>Login - AI-Sarosh</title>

        <!-- FAVICON -->
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- STYLE -->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/style.css">

    </head>

    <body>


        <!-- **********  wrapper  ********** -->

        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-lg-4 d-lg-flex justify-content-center align-items-center bg-light">
                    <div class="login">
                        <div class="title">
                            <h3>AI-Sarosh</h3>
                            <p>Welcome back, please login to you account</p>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}"  required>
                            </div>
                            <div class="form-group mt-2">
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 d-flex justify-content-center align-items-center">
                    <div class="w-100 py-5">
                        <img class="img-fluid d-block mx-auto center-block"
                            src="{{ asset('app-assets') }}/images/error.svg" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- **********  Wrapper  ********** -->


        <!-- **********  Javascript  ********** -->

        <script src="{{ asset('app-assets') }}/js/jquery-3.6.0.min.js"></script>

        <!-- bootstrap -->
        <script src="{{ asset('app-assets') }}/js/bootstrap/bootstrap.bundle.min.js"></script>

        <!-- jquery-nicescroll -->
        <script src="{{ asset('app-assets') }}/js/jquery-nicescroll/jquery.nicescroll.min.js"></script>

        <!-- apexcharts -->
        <script src="{{ asset('app-assets') }}/js/apexcharts/apexcharts.min.js"></script>
        <script src="{{ asset('app-assets') }}/js/apexcharts/apexcharts-custom.js"></script>

        <!-- custom -->
        <script src="{{ asset('app-assets') }}/js/custom.js"></script>
        <!-- jquery -->

        <!-- bootstrap -->

        <!-- jquery-nicescroll -->

        <!-- custom -->

    </body>

</html>
