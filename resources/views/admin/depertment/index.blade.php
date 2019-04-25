@extends('master.app')

@section('title',"View Depertment")

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
                        <h4 class="page-title">Department</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{route('admin.department.create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Department</a>
                    </div>
                </div>
                 <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-border table-striped custom-table datatable mb-0">
                <thead>
                  <tr>
                    <th>SL</th>
                    
                    <th>Dept Name</th>
                    <th>Dept Head</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                   
                    
                  </tr>
                </thead>
                <tbody>

                  @foreach($datas as $key=>$data)

                 
                  <tr>
                     <td>{{$key+1}}</td>
                    
                    
                   
                    <td>{{$data->name}}</td>
                    <td>{{$data->dept_head}}</td>
                    <td>{{$data->location}}</td>
                    <td>

                      @if ($data->status==1)
                      <span class="custom-badge status-green">Active</span>

                      @else
                        <span class="custom-badge status-red">Dective</span>
                      @endif



                    </td>
                    
                    
                   

                    
                  
                   <td>
                      <a href="{{route('admin.department.edit',$data->id)}}" class="btn btn-primary">Edit</a>

                      <button type="submit" onclick="deletetest({{$data->id}})" class="btn btn-danger waves-effect"> Delete</button>

                      <form id="delete-action-{{$data->id}}" action="{{route('admin.department.destroy',$data->id)}}" method="post">
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

