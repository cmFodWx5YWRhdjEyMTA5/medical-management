@extends('master.app')

@section('title',"Edit Outdoor Appointment")

@push('css')
  <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endpush

@section('content')

    <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Edit Outdoor Appointment</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right">
                        <a href="{{route('admin.outdoor-appointment.index')}}" class="btn btn btn-primary btn-rounded float-right">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <form action="{{route('admin.outdoor-appointment.update', $appointment->id)}}" method="post">
                    @csrf
                    @method('put')
                	  
                    <div class="card-box">
                        <h3 class="card-title">Patient Information</h3>
                        <div class="row">

                            <div class="col-md-6">

                            	<div class="form-group">
                                    <label>Patient Name *</label>
                                    <input class="form-control" name="patient_name" value="{{ $appointment->patient_name }}" type="text" >
                                </div>
                                @if($errors->has('patient_name'))
                                    <span style="color:red">{{$errors->first('patient_name')}}</span>
                                @endif
                                
                            </div>
                            <div class="col-md-6">

                            	<div class="form-group">
                                    <label>Patient Age *</label>
                                    <input class="form-control" name="age" value="{{ $appointment->age }}" type="number" >
                                </div>
                                @if($errors->has('age'))
                                    <span style="color:red">{{$errors->first('age')}}</span>
                                @endif
                               
                            </div>
                            <div class="col-md-6">

                            	<div class="form-group">
                                    <label>Patient Phone *</label>
                                    <input class="form-control" name="phone" value="{{ $appointment->phone }}" type="text" >
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
                                        <option {{ ($appointment->gender == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                        <option {{ ($appointment->gender == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                    </select>
                                </div>
                                @if($errors->has('gender'))
                                    <span style="color:red">{{$errors->first('gender')}}</span>
                                @endif
                               
                            </div>

                             <div class="col-md-8">

                                <div class="form-group">
                                    <label>Patient Address *</label>
                                    <textarea name="address" id="" class="form-control">{{ $appointment->address }}</textarea>
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
                                            <option {{ ($appointment->purpose_id == $purpose->id) ? 'selected' : '' }} value="{{ $purpose->id }}">{{ $purpose->purpose }}</option>
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
                                            <option {{ ($appointment->doctor_id == $doctor->user->id) ? 'selected' : '' }} value="{{ $doctor->user->id }}">{{ $doctor->user->name }}</option>
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
                                    <input type="text" name="appointment_date" value="{{ $appointment->appointment_date }}" id="appointment_date" class="form-control">
                                    <div id="available_day" class="mt-1"></div>
                                </div>
                                @if($errors->has('appointment_date'))
                                    <span style="color:red">{{$errors->first('appointment_date')}}</span>
                                @endif
                                
                            </div>

                            <div class="col-md-6">

                                <div class="form-group text-center">
                                    <label>Doctor Fee</label>
                                    <h3> 
                                        <i class="fa fa-money"></i> 
                                        <span id="doctor_fee">
                                            {{ $appointment->doctor->fee }}
                                        </span>
                                    </h3>
                                </div>
                                
                            </div>

                        </div>
                    </div>

                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn" type="submit">
                            Update Appointment
                        </button>
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

        appointment_date();

        $("#appointment_date").datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            onSelect: function () {
                appointment_date();
            }
        });

    });

    function appointment_date() {
        $.ajax({
            url: "{{ route('admin.doctor-available-day') }}",
            method: "POST",
            data: { doctor_id: $('#doctor_id').val(), date: $('#appointment_date').val(), _token: '{{ csrf_token() }}' },
            success: function (response) {
                $('#available_day').html(response);
            }
        });
    }


    $('#doctor_id').change(function() {

        if ($('#doctor_id').val() == '') {

            $('#doctor_fee').html('');

        } else {

            $.ajax({
                url: "{{ route('admin.doctor-fee') }}",
                method: "POST",
                data: { doctor_id: $('#doctor_id').val(), _token: '{{ csrf_token() }}' },
                dataType: "json",
                success: function (response) {
                    $('#doctor_fee').html(response);
                }
            });
        }
    });

  </script>

@endpush

