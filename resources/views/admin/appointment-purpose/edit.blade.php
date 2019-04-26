@extends('master.app')

@section('title',"Edit Appointment Purpose")

@push('css')
  <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/bootstrap-datetimepicker.min.css')}}">

@endpush

@section('content')

    <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7">
                        <h4 class="page-title">Edit Purpose</h4>
                    </div>
                    <div class="col-sm-5 col-6 text-right">
                        <a href="{{route('admin.appointment-purpose.index')}}" class="btn btn-info btn-rounded"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>

                <form action="{{route('admin.appointment-purpose.update', $purpose->id)}}" method="post">
                    @csrf
                    @method('put')
                	  
                    <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">

                            	<div class="form-group">
                                    <label>Purpose *</label>
                                    <input type="text" name="purpose" value="{{ $purpose->purpose }}" id="" class="form-control">
                                    @if($errors->has('purpose'))
                                        <span style="color:red">{{$errors->first('purpose')}}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-12">

                            	<div class="form-group">
                                    <label>Description *</label>
                                    <textarea name="description" id="editor1" class="form-control" rows="10">{{ $purpose->description }}</textarea>
                                    @if($errors->has('description'))
                                        <span style="color:red">{{$errors->first('description')}}</span>
                                    @endif
                                </div>

                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-primary submit-btn" type="submit">UPDATE PURPOSE</button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
    </div>

@endsection



@push('js')

   <script src="{{asset('backend/assets/js/select2.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    
    <script src="https://cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>

@endpush

