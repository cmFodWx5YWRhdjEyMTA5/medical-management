@extends('master.app')

@section('title',"Edit Test Format")

@push('css')
  <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/bootstrap-datetimepicker.min.css')}}">

@endpush

@section('content')

    <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7">
                        <h4 class="page-title">Edit Test Format</h4>
                    </div>
                    <div class="col-sm-5 col-6 text-right">
                        <a href="{{route('admin.test-format.index')}}" class="btn btn-info btn-rounded"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                <form action="{{route('admin.test-format.update', $test_format->id)}}" method="post">
                    @csrf
                    @method('put')
                	  
                    <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">

                            	<div class="form-group">
                                    <label>Test *</label>
                                    <select name="test_id" id="" class="form-control">

                                        <option value="">-- Select Test --</option>

                                        @foreach ($tests as $test)
                                            <option {{ ($test->id == $test_format->test_id) ? 'selected' : '' }} value="{{ $test->id }}">
                                                {{ $test->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @if($errors->has('test_id'))
                                        <span style="color:red">The test field is required.</span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-12">

                            	<div class="form-group">
                                    <label>Test Format *</label>
                                    <textarea name="test_format" id="editor1" class="form-control" rows="10">{{ $test_format->test_format }}</textarea>
                                    @if($errors->has('test_format'))
                                        <span style="color:red">{{$errors->first('test_format')}}</span>
                                    @endif
                                </div>

                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-primary submit-btn" type="submit">UPDATE FORMAT</button>
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

