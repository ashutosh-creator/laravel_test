<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CDP</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/login-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/login-assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/login-assets/css/iofrm-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/login-assets/css/iofrm-theme7.css')}}">
</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <!-- <img class="logo-size" src="{{asset('public/login-assets/images/logo-light.svg')}}" alt=""> -->
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="{{asset('public/login-assets/images/graphic3.svg')}}" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Get more things done with Loggin platform.</h3>
                        <p>Access to the most powerfull tool in the entire design and web industry.</p>

                        @if(Session::has('flash_message_error'))
                      
                      <div class="col-lg-6 col-lg-12">
                       <div class="alert alert-danger alert-rounded">   {!! Session('flash_message_error')!!}
                                   <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                               </div>
                      </div>
         
                       @endif


                        @if(Session::has('flash_messsage_success'))
                      
                      <div class="col-lg-6 col-lg-12">
                       <div class="alert alert-success alert-rounded">   {!! Session('flash_messsage_success')!!}
                                   <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                               </div>
                      </div>
         
                       @endif
                        <div class="page-links">
                            <a href="{{route('login')}}" class="active">Login</a><a href="{{route('register')}}">Register</a>
                        </div>
                        <form method="post" action="{{route('authenticate')}}">
                            @csrf
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button>
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('public/login-assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/login-assets/js/popper.min.js')}}"></script>
<script src="{{asset('public/login-assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/login-assets/js/main.js')}}"></script>
</body>


</html>