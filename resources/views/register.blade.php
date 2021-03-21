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
    
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <!-- <img class="logo-size" src="images/logo-light.svg" alt=""> -->
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
                        

                        @if($errors->any())
                 
                 <div class="alert alert-danger">
                    <ul>
            
                         @foreach($errors->all() as $error)
                         
                           <li>{{$error}}</li>

                         @endforeach
                    
                    </ul>
                 </div>

                       @endif


                       @if(Session::has('flash_message_success'))
                      
                      <div class="col-lg-6 col-lg-12">
                       <div class="alert alert-success alert-rounded">   {!! Session('flash_message_success')!!}
                                   <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                               </div>
                      </div>
         
                    @endif
                  
                     
                        <div class="page-links">
                            <a href="{{route('login')}}">Login</a><a href="{{route('register')}}" class="active">Register</a>
                        </div>
                        <div class="form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="flexRadioDefault"
                                    id="admin"
                                    value="1"
                                    
                                />
                                <label class="form-check-label" for="admin"> Admin </label>
                                </div>

                                <!-- Default checked radio -->
                                <div class="form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="flexRadioDefault"
                                    id="customer"
                                    value="2"
                                    
                                />
                                <label class="form-check-label" for="customer"> Customer </label>
                                </div>
                                                        
                        <form  method="POST" action="{{ route('store_register_user') }}"> 
                            @csrf

                            <input style="display:none;" class="form-control" type="text" name="name" id="name" placeholder="Full Name" >
                            <input style="display:none;" class="form-control" type="text" name="lname" id="lname" placeholder="Last Name" >
                            <input style="display:none;" class="form-control" type="email" name="email" id="email" placeholder="E-mail Address" >
                            <input style="display:none;" class="form-control" type="number" name="p_number" id="p_number" placeholder="Enter contact" >
                            <input style="display:none;" class="form-control" type="password" name="password" id="password" placeholder="Password" >
                           
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                       
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

<script>
$('#admin').click(function(){
    $('#name,#email,#password').show();
    $('#lname,#p_number').hide();

});

$('#customer').click(function(){
    $('#name,#lname,#email,#p_number,#password').show();
});

</script>