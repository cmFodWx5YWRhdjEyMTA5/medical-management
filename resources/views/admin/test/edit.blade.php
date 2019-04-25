@extends('master.app')

@section('title',"Add Test")

@push('css')
  <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/bootstrap-datetimepicker.min.css')}}">

@endpush

@section('content')

    <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Add Test</h4>
                    </div>
                </div>
                <form action="{{route('admin.test.update',$data->id)}}" method="post">
                  @method('PUT')
                	@csrf
                	  
                           <div class="card-box">
                        <h3 class="card-title">Test Informations</h3>
                        <div class="row">
                            <div class="col-md-12">


                            	<div class="form-group">
                                        <label>Test Name*</label>
                                        <input class="form-control"  value="{{$data->name}}" name="name" type="text" required="">
                                  </div>

                                   @if($errors->has('name'))
                                  <strong style="color:red">{{$errors->first('name')}}</strong>

                                  @endif



                                
                            </div>
                            <div class="col-md-12">

                            	<div class="form-group">
                                        <label>Test Price *</label>
                                        <input class="form-control" name="price" value="{{$data->price}}" type="number" required="">
                                  </div>

                                   @if($errors->has('price'))
                                  <strong style="color:red">{{$errors->first('price')}}</strong>

                                  @endif



                                
                            </div>

                            <div class="col-md-12">

                              <div class="form-group">
                                        <span>Test details *</span><br>
                                         <textarea name="details" rows="3"  cols="113">{{$data->details}}</textarea>
                                  </div>

                                   @if($errors->has('details'))
                                  <strong style="color:red">{{$errors->first('details')}}</strong>

                                  @endif



                                
                            </div>


                            <div class="col-md-6">

                            	<div class="form-group">
                                        <label>Test Spiceman*</label>
                                        <input class="form-control" name="spiceman"  value="{{$data->spiceman}}"  type="text" required="">
                                  </div>

                                    @if($errors->has('spiceman'))
                                  <strong style="color:red">{{$errors->first('spiceman')}}</strong>

                                  @endif


                               
                            </div>
                            <div class="col-md-6">

                            	<div class="form-group">
                                        <label>Completed With</label>
                                        <input class="form-control" name="tester_name" value="{{Auth::user()->name}}"  type="text" required="">
                                  </div>
                                    @if($errors->has('tester_name'))
                                  <strong style="color:red">{{$errors->first('tester_name')}}</strong>

                                  @endif


                               
                            </div>

                        

                             

                            <div class="col-md-6">


                            	<div class="form-group">
                                        <label>Test Type *</label>

                                    <select  name="test" class="select form-control floating" required="">
                                        <option value="t-1" selected>Test-1</option>
                                        <option value="t-1">Test-2</option>
                                    </select>
                                        
                                  </div>

                                    @if($errors->has('test'))
                                  <strong style="color:red">{{$errors->first('test')}}</strong>

                                  @endif

                                
                            </div>


                        </div>
                    </div>



                   
                  
                 
                       

                    
                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="submit">Edit Test</button>
                    </div>
                </form>
            </div>
            

@endsection



@push('js')

   <script src="{{asset('backend/assets/js/select2.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/moment.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

@endpush

