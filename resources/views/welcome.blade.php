<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="friendbook">
    <meta name="keywords" content="friendbook">
    <meta name="author" content="friendbook">
    <link rel="icon" href="{{asset('build/assets/images/favicon.png')}}" type="image/x-icon" />
    <title>Friendbook</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Theme css -->
    @vite(['resources/assets/scss/style.scss'])

</head>

<body>

    <!-- loader start -->
    <div class="loading-text">
        <div>
            <h1 class="animate">Loading</h1>
        </div>
    </div>
    <!-- loader end -->


    <!-- login section start -->
    <section class="login-section">
        <div class="header-section">
            <div class="logo-sec">
                <a href="index.html">
                    <img src="{{asset('build/assets/images/logo.png')}}" alt="logo" class="img-fluid blur-up lazyload">
                </a>
            </div>
            <div class="right-links">
                <ul>
                    <li>
                        <a href="#">
                            about
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            upgrade
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-5 d-none d-lg-block">
                    <div class="login-welcome">
                        <div>
                            {{-- <img src="../assets/images/login/charcter.png" class="img-fluid blur-up lazyload"
                                alt="charcter"> --}}
                            <h1>Welcome Back!</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-10 col-12 m-auto">
                    <div class="login-form">
                        <div>
                            <div class="login-title">
                                <h2>Login</h2>
                            </div>
                            <div class="login-discription">
                                <h3>Hello Everyone, Welcome Back</h3>
                                <h4>Welcome to Friendbook, please login to your account.
                                </h4>
                            </div>
                            <div class="form-sec">
                                <div>
                                    <form class="theme-form">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email">
                                            <i class="input-icon iw-20 ih-20" data-feather="user"></i>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                placeholder="Password">
                                            <i class="input-icon iw-20 ih-20" data-feather="eye"></i>
                                            <!-- <i class="input-icon" data-feather="eye-off" width="20" height="20"></i> -->
                                        </div>
                                        <div class="bottom-sec">
                                            <div class="form-check checkbox_animated">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">remember me</label>
                                            </div>
                                            <a href="#" class="ms-auto forget-password">forget
                                                password?</a>
                                        </div>
                                        <div class="btn-section">
                                            <a href="#" class="btn btn-solid btn-lg">login</a>
                                            <a href="register.html" class="btn btn-solid btn-lg ms-auto">sign up</a>
                                        </div>
                                    </form>
                                    <div class="connect-with">
                                        <h6><span>OR Connect With</span></h6>
                                        <ul class="social-links">
                                            <li class="google">
                                                <a href="#">
                                                    <svg class="">
                                                        <use xlink:href="{{asset('build/assets/svg/icons.svg#google')}}"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="facebook">
                                                <a href="#">
                                                    <svg class="">
                                                        <use xlink:href="{{asset('build/assets/svg/icons.svg#facebook')}}"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="twitter">
                                                <a href="#">
                                                    <svg class="">
                                                        <use xlink:href="{{asset('build/assets/svg/icons.svg#twitter')}}"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="how-work">
            <div class="media">
                <i data-feather="play-circle"></i>
                <div class="media-body">
                    <h2>how it work?</h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- login section end -->
    @vite(['resources/js/app.js','resources/js/site.js'])
</body>

</html>
