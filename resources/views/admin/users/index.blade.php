@extends('master.app')

@section('title',"View Doctor")

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
                        <h4 class="page-title">User</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{route('admin.user.create')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add User</a>
                    </div>
                </div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-border table-striped custom-table datatable mb-0">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th> 
                    <th>Username</th> 
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($datas as $key=>$data) 
                  <tr>
                     <td>{{$key+1}}</td>
                    <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt="">{{$data->name}}</td>
                    
                  
                   
                   
                    <td> {{$data->email}}</td> 
                    <td>{{$data->username}}</td>
                     
                   




                         

                      
                  
                    
                  
                    <td>
                          

                         <a class="btn btn-primary" href="{{route('admin.doctor.edit',$data->id)}}"> <span>Edit</span> </a>
                         <button type="submit" class="btn btn-danger" onclick="deletedoctor({{$data->id}})">Delete</button>

                         <form id="delete-data-{{$data->id}}" method="post" action =" "> 
                            @csrf
                            @method("DELETE")
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
          
            function deletedoctor(id){
             

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
                            document.getElementById('delete-data-'+id).submit();
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

