
@extends('master.app')

@section('title',"Edit Doctor Department")

@push('css')

<link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/select2.min.css')}}">
@endpush

@section('content')

<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">My Profile</h4>
                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="edit-profile.html" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="{{asset('storage/profileImage/'.$data->user->image)}}" alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{$data->user->name}}</h3>
                                                <small class="text-muted">{{$data->speciality}}</small>
                                                <div class="staff-id">Employee ID : {{$data->user->id}}</div>
                                                <div class="staff-msg"><a href="#" class="btn btn-primary">Send Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#">{{$data->mobile}}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#">{{$data->user->email}}</a></span>
                                                </li>
                                                
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text">{{$data->user->about}}</span>
                                                </li>

                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text">{{$data->gender}}</span>
                                                </li>
                                                <li>
                                                    <span class="title">Degree:</span>
                                                    <span class="text">{{$data->degree}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>


				<div class="profile-tabs">
					<ul class="nav nav-tabs nav-tabs-bottom">
						<li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Available Day</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">user Information</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">password</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="card-title">Availabe And Visit Informations</h3>
                            <form action="{{route('admin.change.date',$data->id)}}" method="POST">
                            	@csrf
                            <div class="experience-box">
                            	 <div class="col-md-6">

                            	<div class="form-group">
                                        <label>Available Time  *</label>

                                    <select name='date[]' class="select form-control show-tick" data-live-search="true"  multiple required="">
                                      <!--   <option value='Saturday'>Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option> -->
                                       
                                        @foreach($dates as $date)
                                        @foreach($data->dates as $ddate)
                                        <option value="{{$date->id}}" {{($date->id == $ddate->id)?'selected':" "}}>{{$date->date}}</option>
                                        @endforeach
                                        @endforeach
                                    </select>                                        
                                  </div>
                                    @if($errors->has('date'))
                                  <strong style="color:red">{{$errors->first('date')}}</strong>

                                  @endif


                               
                            </div>
                            <div class="col-md-6">



                            		<div class="form-group">
                                        <label>Consultancy Fee *</label>
                                        	<input type="number" name="fee"  value="{{$data->fee}}" class="form-control"  required="">
                                        
                                  </div>

                                    @if($errors->has('fee'))
                                  <strong style="color:red">{{$errors->first('fee')}}</strong>

                                  @endif


                            </div>


                                

                            </div>
                            	<button type="submit" class="btn btn-primary">Update Information</button>
                            	</form>
                        </div>
                        
                    </div>
                </div>
						</div>
						<div class="tab-pane" id="bottom-tab2">

							<div class="row">
                    <div class="col-md-12">
                    	<form action="{{route('admin.info.change',$data->id)}}" method="post"  enctype="multipart/form-data">
                    		@csrf
                        <div class="card-box">
                            <h3 class="card-title">Personal Informations</h3>
                            <div class="experience-box">



                            	<div class="col-md-12">


                            	<div class="form-group">
                                        <label>Doctor Name*</label>
                                        <input class="form-control" name="name" value="{{$data->user->name}}" type="text" required="">
                                  </div>

                                   @if($errors->has('name'))
                                  <strong style="color:red">{{$errors->first('name')}}</strong>

                                  @endif



                                
                            </div>
                            <div class="col-md-12">

                            	<div class="form-group">
                                        <label>Doctor's Degree *</label>
                                        <input class="form-control"  value="{{$data->degree}}" name="degree" type="text" required="">
                                  </div>

                                   @if($errors->has('degree'))
                                  <strong style="color:red">{{$errors->first('degree')}}</strong>

                                  @endif



                                
                            </div>
                            <div class="col-md-6">

                            	<div class="form-group">
                                        <label>Speciality *</label>
                                        <input class="form-control" value="{{$data->speciality}}"  name="speciality" type="text" required="">
                                  </div>
                                    @if($errors->has('speciality'))
                                  <strong style="color:red">{{$errors->first('speciality')}}</strong>

                                  @endif


                                
                            </div>
                            <div class="col-md-6">

                            	<div class="form-group">
                                        <label>Experience*</label>
                                        <input class="form-control"  value="{{$data->experience}}" name="experience"  type="text" required="">
                                  </div>

                                    @if($errors->has('experience'))
                                  <strong style="color:red">{{$errors->first('experience')}}</strong>

                                  @endif


                               
                            </div>
                            <div class="col-md-6">

                            	<div class="form-group">
                                        <label>Doctor's Reg Number   *</label>
                                        <input class="form-control"  value="{{$data->RegNumber}}"  name="RegNumber" type="number" required="">
                                  </div>
                                    @if($errors->has('RegNumber'))
                                  <strong style="color:red">{{$errors->first('RegNumber')}}</strong>

                                  @endif


                               
                            </div>

                             <div class="col-md-6">


                            	<div class="form-group">
                                        <label>Doctor's Email *</label>
                                        <input class="form-control" value="{{$data->user->email}}"   name="email" type="email" required="" disabled="">
                                  </div>


                                  @if($errors->has('email'))
                                  <strong style="color:red">{{$errors->first('email')}}</strong>

                                  @endif

                               
                            </div>

                             <div class="col-md-6">


                            	<div class="form-group">
                                        <label>Doctor Mobile  *</label>
                                        <input class="form-control"  value="{{$data->mobile}}" name="mobile" type="number" required="">
                                  </div>
                                  	  @if($errors->has('mobile'))
                                  <strong style="color:red">{{$errors->first('mobile')}}</strong>

                                  @endif
                                
                            </div>


                            <div class="col-md-6">


                            	<div class="form-group">
                                        <label>Gender  *</label>

                                    <select  name="gender" class="select form-control floating" required="">
                                        <option value="male" {{($data->gender=='male')?"selected":""}}>Male</option>
                                        <option value="female"  {{($data->gender=='female')?"selected":""}}>Female</option>
                                    </select>
                                        
                                  </div>

                                    @if($errors->has('gender'))
                                  <strong style="color:red">{{$errors->first('gender')}}</strong>

                                  @endif

                                
                            </div>
                             <div class="col-md-6">
                             <div class="form-group">
								<label> <span style="color:red">Doctor's Assiociation Certificate *</span> </label>
								<div class="profile-upload">
									<div class="upload-img">
										<img alt="" src="assets/img/user.jpg">
									</div>
									<div class="upload-input">
										<input type="file" name="certificate" class="form-control" required="">
									</div>
								</div>
							</div>
							  @if($errors->has('certificate'))
                                  <strong style="color:red">{{$errors->first('certificate')}}</strong>

                                  @endif
							</div>


							<div class="col-md-6">
                    	  <div class="form-group">
								<label>  <span style="color:red">Doctor's Photo*</span> </label>
								<div class="profile-upload">
									<div class="upload-img">
										<img alt="" src="assets/img/user.jpg">
									</div>
									<div class="upload-input">
										<input type="file" name="photo" class="form-control" required="">
									</div>
								</div>
							</div>

							  @if($errors->has('photo'))
                                  <strong style="color:red">{{$errors->first('photo')}}</strong>

                                  @endif
							</div>

								<button type="submit" class="btn btn-primary">Update Information</button>


								




                                

                                	
                            </div>
                        </div>

                        </form>
                        
                    </div>
                </div>
	</div>
						<div class="tab-pane" id="bottom-tab3">
							<div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="card-title">Login  Informations</h3>
                            <div class="experience-box">
                                

                                	<div class="col-md-12">

                            	<div class="form-group">
                                        <label>UserName</label>
                                        <input class="form-control" value="{{$data->user->username}}" name="username" type="text" required="">
                                  </div>
                                    @if($errors->has('username'))
                                  <strong style="color:red">{{$errors->first('username')}}</strong>

                                  @endif



                                  <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name="Newpassword" type="Password" required="">
                                  </div>
                                    @if($errors->has('Newpassword'))
                                  <strong style="color:red">{{$errors->first('Newpassword')}}</strong>

                                  @endif

                                   <div class="form-group">
                                        <label>Retype-Password</label>
                                        <input class="form-control" type="Password" name="Newpassword_confirmation" required="">
                                  </div>
                                   






                            </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
						</div>
					</div>
				</div>
            </div>
            <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item new-message">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">John Doe</span>
                                            <span class="message-time">1 Aug</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Tarah Shropshire </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Mike Litorus</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Catherine Manseau </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">D</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Domenic Houston </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">B</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Buster Wigton </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Rolland Webber </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Claire Mapes </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Melita Faucher</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Jeffery Lalor</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">L</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Loren Gatlin</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Tarah Shropshire</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
            

@endsection



@push('js')
 <script src="{{asset('backend/assets/js/select2.min.js')}}"></script>

@endpush


















