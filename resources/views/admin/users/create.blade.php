@extends('master.app')

@section('title',"Add User")

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/bootstrap-datetimepicker.min.css')}}">

@endpush

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Add User</h4>
            </div>
        </div>
        <form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card-box">
                <h3 class="card-title">Contact Informations</h3>
                <div class="row">
                    <div class="col-md-6">

 
                        <div class="form-group">
                            <label>Full Name*</label>
                            <input class="form-control" name="name" type="text" required="">
                        </div>

                        @if($errors->has('name'))
                        <strong style="color:red">{{$errors->first('name')}}</strong>

                        @endif




                    </div>
                    <div class="col-md-6">


                        <div class="form-group">
                            <label>User Roll*</label>
                            <select class="form-control" name="role_id">
                                
                                @foreach($role as $srole) 
                                <option value="{{ $srole->id }}">{{ $srole->name }}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        @if($errors->has('name'))
                        <strong style="color:red">{{$errors->first('name')}}</strong>

                        @endif




                    </div>



                    <div class="col-md-6">


                        <div class="form-group">
                            <label>Email *</label>
                            <input class="form-control" name="email" type="email" required="">
                        </div>


                        @if($errors->has('email'))
                        <strong style="color:red">{{$errors->first('email')}}</strong>

                        @endif


                    </div>

                    <div class="col-md-6">


                        <div class="form-group">
                            <label>Mobile  *</label>
                            <input class="form-control" name="mobile" type="number" required="">
                        </div>
                        @if($errors->has('mobile'))
                        <strong style="color:red">{{$errors->first('mobile')}}</strong>

                        @endif

                    </div>


                    <div class="col-md-6">


                        <div class="form-group">
                            <label>Gender  *</label>

                            <select  name="gender" class="select form-control floating" required="">
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            </select>

                        </div>

                        @if($errors->has('gender'))
                        <strong style="color:red">{{$errors->first('gender')}}</strong>

                        @endif


                    </div>
                   


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>  <span style="color:red">Profile Photo*</span> </label>
                            <div class="profile-upload">
                                <div class="upload-img">
                                    <img alt="" src="assets/img/user.jpg">
                                </div>
                                <div class="upload-input">
                                    <input type="file" name="photo" class="form-control" required="">
                                </div>
                            </div>
                        </div>

                        @if($errors->has('photo'))
                        <strong style="color:red">{{$errors->first('photo')}}</strong>

                        @endif
                    </div>




                </div>
            </div> 
            <div class="card-box">
                <h3 class="card-title">Login  Informations</h3>
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>UserName</label>
                            <input class="form-control" name="username" type="text" required="">
                        </div>
                        @if($errors->has('username'))
                        <strong style="color:red">{{$errors->first('username')}}</strong>

                        @endif



                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="Newpassword" type="Password" required="">
                        </div>
                        @if($errors->has('Newpassword'))
                        <strong style="color:red">{{$errors->first('Newpassword')}}</strong>

                        @endif

                        <div class="form-group">
                            <label>Retype-Password</label>
                            <input class="form-control" type="Password" name="Newpassword_confirmation" required="">
                        </div>







                    </div>



                </div>



                <div class="text-center m-t-20">
                    <button class="btn btn-primary submit-btn" type="submit">Add User</button>
                </div>
        </form>
    </div>


    @endsection



    @push('js')

    <script src="{{asset('backend/assets/js/select2.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    @endpush

