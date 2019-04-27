@extends('master.app')

@section('title',"Edit Test")

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/bootstrap-datetimepicker.min.css')}}">

@endpush

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-7">
                <h4 class="page-title">Edit Test</h4>
            </div>
            <div class="col-sm-5 col-6 text-right m-b-30">
                <a href="{{route('admin.outdoortest.index')}}" class="btn btn-info btn-rounded"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <form action="{{route('admin.outdoortest.update', $patient->id)}}" method="post" class="">
            @csrf
            @method('put')

            <div class="card-box">
                <h3 class="card-title">Patient Informations</h3>
                <div class="row">
                    <div class="col-md-4">

                        <div class="form-group">
                            <label>Name*</label>
                            <input class="form-control" placeholder="Name" name="name" value="{{ $patient->name }}" type="text" >
                        
                            @if($errors->has('name'))
                                <span style="color:red">{{$errors->first('name')}}</span>
                            @endif

                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label>Age *</label>
                            <input class="form-control" placeholder="age" name="age" value="{{ $patient->age }}" type="text" >
                        
                            @if($errors->has('age'))
                                <span style="color:red">{{$errors->first('age')}}</span>
                            @endif

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <span>Gender *</span><br>
                            <select  class="form-control" name="sex" id="sex">
                                <option value="">select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                            <script>document.getElementById('sex').value = "{{ $patient->sex }}";</script>

                            @if($errors->has('sex'))
                                <span style="color:red">{{$errors->first('sex')}}</span>
                            @endif

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="form-group">
                            <label>Refd. By (Our Doctor) *</label>
                            <input class="form-control" name="refer_by_outdoor_dr" value="{{ $patient->refer_by_outdoor_dr }}" type="text" >
                        
                            @if($errors->has('refer_by_outdoor_dr'))
                                <span style="color:red">The refer by doctor field is required.</span>
                            @endif

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label>Refd. by (Others)</label>
                            <input class="form-control" name="refer_by_other" value="{{ $patient->refer_by_other }}" type="text" >

                            @if($errors->has('refer_by_other'))
                                <span style="color:red">{{$errors->first('refer_by_other')}}</span>
                            @endif 

                        </div>

                    </div> 

                    <div class="col-md-4"> 
                        <div class="form-group">

                            <label>Phone *</label>
                            <input class="form-control" name="phone" value="{{ $patient->phone }}" type="text" >

                            @if($errors->has('phone'))
                                <span style="color:red">{{$errors->first('phone')}}</span>
                            @endif

                        </div>

                    </div>

                    <div class="col-md-6"> 
                        <div class="form-group">

                            <label>Address *</label>
                            <textarea name="address" class="form-control">{{ $patient->address }}</textarea>

                            @if($errors->has('address'))
                                <span style="color:red">{{$errors->first('address')}}</span>
                            @endif

                        </div>

                    </div>

                </div>


                <h3 class="card-title">Test Informations</h3>
                <div class="row"> 
                    <div class="col-md-8">

                        <label>Search Test*</label> 
                        <select class="form-control" id="test_id">
                            @foreach($tests as $test)
                            <option value="{{ $test->id }}">  {{ $test->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('test_id'))
                            <p style="color:red"> The test selection is required. </p>
                        @endif

                    </div>
                    <div class="col-md-2 pt-4">

                        <button type="button" id="btn-test-details" class="btn btn-primary mt-2">
                            <i class="fa fa-plus-circle"></i> Add
                        </button>
                        
                    </div>

                </div>

                <div class="table-responsive mt-2">
                    <table class="table" id="show-tests">
                        <thead>
                            <tr id="table-head">
                                <th>Test Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        @foreach ($patient->outdoortests as $outdoortest)
                            <tr id="test_row_{{ $outdoortest->test_id }}">
                              <input type="hidden" name="test_id[]" value="{{ $outdoortest->test_id }}" />
                              <td>{{ $outdoortest->test->name }}</td>
                              <td class="test-price">{{ $outdoortest->test->price }}</td>
                              <td width="10%">
                              <button type="button" class="btn-remove btn btn-sm btn-danger" data-testid="{{ $outdoortest->test_id }}">
                                  Delete
                              </button>
                              </td>
                            </tr>
                        @endforeach

                    </table>
                    <div class="float-right text-right p-3 border">
                        <p>
                            Total Price : <span id="total_price">0.00</span>
                            <input type="hidden" name="total_price" id="total_price_input" class="text-right" readonly>
                        </p>
                        <p>
                            Customer Pay : 
                            <input type="text" name="customer_pay" id="customer_pay" value="0.00" class="text-right border">
                            <br><small>* If patient not payable then input 0.00</small>
                        </p>
                        <p>
                            Due : 
                            <span id="due">0.00</span>
                        </p>
                    </div>
                </div>

            </div> 

            <div class="text-center m-t-20">
                <button class="btn btn-primary submit-btn" type="submit">Update Outdoor Test</button>
            </div>
        </form>
    </div>

    @endsection



    @push('js')

    <script src="{{asset('backend/assets/js/select2.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script>

       getTotalPrice();

       $(document).on('click', '#btn-test-details', function() {
           var test_id = $('#test_id').val();
           addTestInformation(test_id);
       });

       function addTestInformation(test_id) {
           var _token = '{{ csrf_token() }}';
           $.ajax({
               url: "{{ route('admin.test-info') }}",
               method: "POST",
               data: {_token:_token, test_id:test_id},
               dataType: "json",
               success: function (response) {
                    $('#table-head').show();
                    $('#show-tests').append(response);
                    getTotalPrice();
               }
           });
       }

       $(document).on('keyup', '#customer_pay', function() {
           $('#due').html(parseFloat(total_test_price() - $(this).val()));
       });

       $(document).on('click', '.btn-remove', function() {
           $('#test_row_' + $(this).data('testid')).remove();
           deleteTestFromOutdoorTest($(this).data('testid'));
           getTotalPrice();
           $('#due').html(total_test_price() - $('#customer_pay').val());
       });

       function deleteTestFromOutdoorTest(id) {
         var _token = '{{ csrf_token() }}';
         var patient_id = {{ $patient->id }};
           $.ajax({
               url: "{{ route('admin.test-delete') }}",
               method: "POST",
               data: {_token:_token, test_id:id, patient_id:patient_id},
               success: function (response) {
                    getTotalPrice();
               }
           });
       }

       function getTotalPrice() {
           $('#total_price').html(total_test_price());
           $('#total_price_input').val(total_test_price());
           $('#due').html(total_test_price() - $('#customer_pay').val());
       }

       function total_test_price() {
           var total = 0;
           $('.test-price').each(function(index, element) {
               total += parseInt(element.textContent);
           });
           return total;
       }
    </script>

    @endpush

