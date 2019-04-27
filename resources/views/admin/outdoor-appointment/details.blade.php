@extends('master.app')

@section('title',"Appointment")

@push('css')
  <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/bootstrap-datetimepicker.min.css')}}">
@endpush

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Appointment Information</h4>
                </div>
                <div class="col-sm-8 col-9 text-right">
                    <a href="{{route('admin.outdoor-appointment.index')}}" class="btn btn btn-primary btn-rounded">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <a href="{{route('admin.outdoor-appointment.edit', $appointment->id)}}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-edit"></i> Edit Appointment
                    </a>
                </div>
            </div>

            <div class="card-box">
                <h3 class="card-title">Patient Information</h3>

                <div class="row">
                    <div class="col-md-4">
                        <strong>Patient Name</strong>
                        <p>{{ $appointment->patient_name }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Age</strong>
                        <p>{{ $appointment->age }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Gender</strong>
                        <p>{{ $appointment->gender }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Phone</strong>
                        <p>{{ $appointment->phone }}</p>
                    </div>
                    <div class="col-md-8">
                        <strong>Address</strong>
                        <p>{{ $appointment->address }}</p>
                    </div>
                </div>

            </div>

            <div class="card-box">
                <strong>Appointment Date :</strong> 
                {{ date('l, d F Y', strtotime($appointment->appointment_date)) }}
            </div>

            <div class="card-box">
                <h3 class="card-title">Appointment Purpose</h3>

                <div class="row">
                    <div class="col-md-6">
                        <strong>Purpose</strong>
                        <p>{{ $appointment->purpose->purpose }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Description</strong>
                        <span class="text-justify">{!! $appointment->purpose->description !!}</span>
                    </div>
                </div>
                
            </div>

            <div class="card-box">
                <h3 class="card-title">Doctor Information</h3>

                <div class="row">
                    <div class="col-md-4">
                        <strong>Doctor Name</strong>
                        <p>{{ $appointment->doctor->user->name }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Registration Number</strong>
                        <p>{{ $appointment->doctor->RegNumber }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Phone</strong>
                        <p>{{ $appointment->doctor->mobile }}</p>
                    </div>
                    <div class="col-md-2">
                        <strong>Fee</strong>
                        <p>{{ $appointment->doctor->fee }}</p>
                    </div>
                </div>
                
            </div>

        </div>
    </div>   

@endsection


@push('js')

   <script src="{{asset('backend/assets/js/select2.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

@endpush

