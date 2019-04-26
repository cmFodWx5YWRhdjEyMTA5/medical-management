@extends('master.app')

@section('title',"Add Outdoor Appointment")

@push('css')
  <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endpush

@section('content')

    <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Add Outdoor Appointment</h4>
                    </div>
                </div>
                <form action="{{route('admin.doctor.store')}}" method="post" enctype="multipart/form-data">
                	@csrf
                	  
                    <div class="card-box">
                        <h3 class="card-title">Patient Information</h3>
                        <div class="row">

                            <div class="col-md-6">

                            	<div class="form-group">
                                    <label>Patient Name *</label>
                                    <input class="form-control" name="patient_name" type="text" >
                                </div>
                                @if($errors->has('patient_name'))
                                    <span style="color:red">{{$errors->first('patient_name')}}</span>
                                @endif
                                
                            </div>
                            <div class="col-md-6">

                            	<div class="form-group">
                                    <label>Patient Age *</label>
                                    <input class="form-control" name="age" type="number" >
                                </div>
                                @if($errors->has('age'))
                                    <span style="color:red">{{$errors->first('age')}}</span>
                                @endif
                               
                            </div>
                            <div class="col-md-6">

                            	<div class="form-group">
                                    <label>Patient Phone *</label>
                                    <input class="form-control" name="phone" type="text" >
                                </div>
                                @if($errors->has('phone'))
                                    <span style="color:red">{{$errors->first('phone')}}</span>
                                @endif
                               
                            </div>

                             <div class="col-md-6">

                                <div class="form-group">
                                    <label>Gender *</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="">-- Select Gender --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                @if($errors->has('gender'))
                                    <span style="color:red">{{$errors->first('gender')}}</span>
                                @endif
                               
                            </div>

                             <div class="col-md-8">

                                <div class="form-group">
                                    <label>Patient Address *</label>
                                    <textarea name="address" id="" class="form-control"></textarea>
                                </div>
                                @if($errors->has('address'))
                                    <span style="color:red">{{$errors->first('address')}}</span>
                                @endif
                               
                            </div>

                        </div>
                    </div>


                    <div class="card-box">
                        <h3 class="card-title">Appointment Information</h3>
                        <div class="row">

                             <div class="col-md-6">

                                <div class="form-group">
                                    <label>Purpose *</label>
                                    <select name="purpose_id" id="" class="form-control">
                                        <option value="">-- Select Purpose --</option>

                                        @foreach ($purposes as $purpose)
                                            <option value="{{ $purpose->id }}">{{ $purpose->purpose }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                @if($errors->has('purpose_id'))
                                    <span style="color:red">{{$errors->first('purpose_id')}}</span>
                                @endif
                                
                            </div>

                             <div class="col-md-6">

                                <div class="form-group">
                                    <label>Doctor *</label>
                                    <select name="doctor_id" id="doctor_id" class="form-control">
                                        <option value="">-- Select Doctor --</option>

                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->user->id }}">{{ $doctor->user->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @if($errors->has('doctor_id'))
                                    <span style="color:red">{{$errors->first('doctor_id')}}</span>
                                @endif
                                
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Date *</label>
                                    <input type="text" name="appointment_date" id="appointment_date" class="form-control">
                                    <div id="available_day" class="mt-1"></div>
                                </div>
                                @if($errors->has('appointment_date'))
                                    <span style="color:red">{{$errors->first('appointment_date')}}</span>
                                @endif
                                
                            </div>

                            <div class="col-md-6">

                                <div class="form-group text-center">
                                    <label>Doctor Fee</label>
                                    <h3> <i class="fa fa-money"></i> <span id="doctor_fee"></span></h3>
                                </div>
                                
                            </div>

                        </div>
                    </div>

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="submit">Add Appointment</button>
                    </div>

                </form>
            </div>
            

@endsection


@push('js')

   <script src="{{asset('backend/assets/js/select2.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $( function() {

        $("#appointment_date").datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            onSelect: function () {
                
                $.ajax({
                    url: "{{ route('admin.doctor-available-day') }}",
                    method: "POST",
                    data: { doctor_id: $('#doctor_id').val(), date: $(this).val(), _token: '{{ csrf_token() }}' },
                    success: function (response) {
                        
                        $('#available_day').html(response);
                        
                    }
                });

            }
        });
    });
  </script>

  <script>
        $(function() {

            $('#doctor_id').change(function() {
                if ($(this).val() == '') {
                    $('#doctor_fee').html('');
                } else {
                    $.ajax({
                        url: "{{ route('admin.doctor-fee') }}",
                        method: "POST",
                        data: { doctor_id: $(this).val(), _token: '{{ csrf_token() }}' },
                        dataType: "json",
                        success: function (response) {
                            $('#doctor_fee').html(response);
                        }
                    });
                }
            });

        });
    </script>

@endpush

