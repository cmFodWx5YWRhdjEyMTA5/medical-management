@extends('master.app')

@section('title',"View Pathology Test Format")

@push('css')
 

  <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/font-awesome.min.css')}}">



   <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/select2.min.css')}}">


@endpush

@section('content')

   <div class="page-wrapper">

      <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Test Format</h4>
            </div>
            <div class="col-sm-8 col-9 text-right">
                <a href="{{route('admin.test-format.create')}}" class="btn btn btn-primary btn-rounded float-right">
                    <i class="fa fa-plus"></i> Add Test Format
                </a>
            </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-border table-striped custom-table datatable mb-0">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Test</th>
                    <th>Format</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($test_formats as $key => $test_format)
                
                  <tr>
                     <td>{{ $key + 1 }}</td>
                     <td>{{ $test_format->test->name }}</td>
                     <td class="text-justify">{!! $test_format->test_format !!}</td>
                    <td>

                      <a href="{{route('admin.test-format.edit', $test_format->id)}}" class="btn btn-primary btn-sm">Edit</a>

                      <button type="submit" onclick="deletetest({{$test_format->id}})" class="btn btn-danger btn-sm waves-effect"> Delete</button>

                      <form id="delete-action-{{$test_format->id}}" action="{{route('admin.test-format.destroy',$test_format->id)}}" method="post">
                        @method('delete')
                        @csrf

                        
                      </form>

                    </td>
                  </tr>
                
                  @endforeach
                 
                </tbody>
              </table>
            </div>
          </div>
                </div>
            </div>
            
        </div>

        <script type="text/javascript">
          
          function deletetest(id){

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {                           
                      document.getElementById('delete-action-'+id).submit();
                    }
                })

          }

        </script>
            

@endsection



@push('js')

    
    <script src="{{asset('backend/assets/js/select2.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/bootstrap-datetimepicker.min.js')}}"></script>


@endpush

