<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dreamguys.co.in/preclinic/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2019 13:49:51 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>@yield('title','Homepage')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/style.css')}}">
      <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @stack('css')
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
       
        @include('master.partial.header')
        @include('master.partial.sidebar')
        @yield('content')
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{asset('backend/assets/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/jquery.slimscroll.js')}}"></script>
    
    <script src="{{asset('backend/assets/js/app.js')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

      {!! Toastr::message() !!}

      <script>
            @if($errors->any())

                        @foreach($errors->all() as $error)

                        Toastr.error('{{$error}}','Error',{
                            progressBar:true,
                            closeButton:true, 
                        });
                        @endforeach


            @endif



      </script>



    @stack('js')

</body>


<!-- Mirrored from dreamguys.co.in/preclinic/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2019 13:50:13 GMT -->
</html>