@extends('master.app')

@section('title',"Add Depertment")

@push('css')
  <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/bootstrap-datetimepicker.min.css')}}">

@endpush

@section('content')

    <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Add Department</h4>
                    </div>
                </div>
                <form action="{{route('admin.department.store')}}" method="post">
                  @csrf
                    
                           <div class="card-box">
                        <h3 class="card-title">Department  Informations</h3>
                        <div class="row">
                            <div class="col-md-12">


                              <div class="form-group">
                                        <label>Department Name*</label>
                                        <input class="form-control" name="name" type="text" required="">
                                  </div>

                                   @if($errors->has('name'))
                                  <strong style="color:red">{{$errors->first('name')}}</strong>

                                  @endif



                                
                            </div>
                            <div class="col-md-12">

                              <div class="form-group">
                                        <label>Department Location *</label>
                                        <input class="form-control" name="location" type="text" required="">
                                  </div>

                                   @if($errors->has('location'))
                                  <strong style="color:red">{{$errors->first('location')}}</strong>

                                  @endif                                
                            </div>

                             <div class="col-md-12">

                              <div class="form-group">
                                        <label>Name Of Department Head *</label>
                                        <input class="form-control" name="dept_head" type="text" required="">
                                  </div>

                                   @if($errors->has('dept_head'))
                                  <strong style="color:red">{{$errors->first('dept_head')}}</strong>

                                  @endif



                                
                            </div>



                            <div class="col-md-12">

                              <div class="form-group">
                                        <span>Department details *</span><br>
                                         <textarea name="details" class="form-control" rows="3"> </textarea>
                                  </div>

                                   @if($errors->has('details'))
                                  <strong style="color:red">{{$errors->first('details')}}</strong>

                                  @endif



                                
                            </div>


                            <div class="col-md-6">

                              <div class="form-group">
                                        <label>Name of The Stuf *</label>
                                        <input class="form-control" name="stuf"  type="text" required="">
                                  </div>

                                    @if($errors->has('stuf'))
                                  <strong style="color:red">{{$errors->first('stuf')}}</strong>

                                  @endif


                               
                            </div>
                            <div class="col-md-6">

                              <div class="form-group">
                                        <label>Department start Date </label>
                                        <input class="form-control" name="date"  type="date" required="">
                                  </div>
                                    @if($errors->has('date'))
                                  <strong style="color:red">{{$errors->first('date')}}</strong>

                                  @endif


                               
                            </div>

                               <div class="form-group">
                           <label class="display-block">Department Status</label>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="product_active" value="1" checked>
                            <label class="form-check-label" for="product_active">
                            Active
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="product_inactive" value="2">
                            <label class="form-check-label" for="product_inactive">
                            Inactive
                            </label>
                          </div>
                            </div>
                             
                       </div>
                    </div> 

                    
                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="submit">Add Test</button>
                    </div>
                </form>
            </div>
            

@endsection



@push('js')

   <script src="{{asset('backend/assets/js/select2.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/moment.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

@endpush

