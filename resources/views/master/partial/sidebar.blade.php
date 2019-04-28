<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            @if(Auth::user()->role->id==1)
            <ul>
                <li class="menu-title">Main</li>
                <li class="">
                    <a href="{{ url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li>   
                    <a href="#"><i class="fa fa-user-md"></i> <span>Users</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('admin.user.create')}}">Add User</a></li>
                        <li><a href="{{route('admin.user.index')}}">All User</a></li>

                    </ul> 
                </li>
                <li>   
                    <a href="#" class="{{ (\Request::route()->getName() == 'this.route') ? 'active' : '' }}"><i class="fa fa-user-md"></i> <span>Doctors</span> <span class="menu-arrow"></span> </a>
                    <ul style="display: none;">
                        <li><a href="{{route('admin.doctor.create')}}">Add Doctor</a></li>
                        <li><a href="{{route('admin.doctor.index')}}">All Doctor</a></li>

                    </ul> 
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa fa-user-md"></i> <span>Departments</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">                         
                        <li><a href="{{route('admin.department.create')}}"><i class="fa fa-plus"></i> Add Departments</a></li>
                        <li><a href="{{route('admin.department.index')}}"><i class="fa fa-eye"></i> All Department</a></li>
                    </ul>
                </li> 

                <li class="">
                    <a href="#"><i class="fa fa-user-md"></i> <span>Test</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('admin.test.create')}}"><i class="fa fa-plus"></i> Add Test</a></li>
                        <li><a href="{{route('admin.test.index')}}"><i class="fa fa-eye"></i> All Test</a></li>
                    </ul> 
                </li>


                <li class="">
                    <a href="#"><i class="fa fa-user-md"></i> <span>Appointment <br> Purpose</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('admin.appointment-purpose.create')}}"><i class="fa fa-plus"></i> Add Purpose</a></li>
                        <li><a href="{{route('admin.appointment-purpose.index')}}"><i class="fa fa-eye"></i> All Purpose</a></li>
                    </ul> 
                </li>


                <li class="submenu">
                    <a href="#"><i class="fa fa-user-md"></i> <span>Outdoor </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fa fa-user-md"></i> <span>Test</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('admin.outdoortest.create')}}"><i class="fa fa-plus"></i>  Add Outdoor Test</a></li>
                                <li><a href="{{route('admin.outdoortest.index')}}"><i class="fa fa-eye"></i> Manage Test</a></li>
                            </ul>
                        </li> 
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fa fa-user-md"></i> <span>Appointments</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">                         
                                <li><a href="{{route('admin.outdoor-appointment.create')}}"><i class="fa fa-plus"></i> Add Appointment</a></li>
                                <li><a href="{{route('admin.outdoor-appointment.index')}}"><i class="fa fa-eye"></i> All Appointment</a></li>
                            </ul>
                        </li>  

                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-user-md"></i> <span>Pathology </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fa fa-user-md"></i> <span>Test Format</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('admin.test-format.create')}}"><i class="fa fa-plus"></i>  Add Test Format</a></li>
                                <li><a href="{{route('admin.test-format.index')}}"><i class="fa fa-eye"></i> Manage Test Format</a></li>
                            </ul>
                        </li> 
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fa fa-user-md"></i> <span>Test Request</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">                         
                                <li><a href="{{route('admin.department.create')}}"><i class="fa fa-plus"></i> Indoor Test Request</a></li>
                                <li><a href="{{route('admin.pathology-outdoor-test-request')}}"><i class="fa fa-eye"></i> Outdoor Test Request</a></li>
                            </ul>
                        </li>  
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-user-md"></i> <span>Radiology </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fa fa-user-md"></i> <span>Test Format</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('admin.doctor.create')}}"><i class="fa fa-plus"></i>  Add Test Format</a></li>
                                <li><a href="{{route('admin.doctor.index')}}"><i class="fa fa-eye"></i> Manage Test Format</a></li>
                            </ul>
                        </li> 
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fa fa-user-md"></i> <span>Test Request</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">                         
                                <li><a href="{{route('admin.department.create')}}"><i class="fa fa-plus"></i> Indoor Test Request</a></li>
                                <li><a href="{{route('admin.department.index')}}"><i class="fa fa-eye"></i> Outdoor Test Request</a></li>
                            </ul>
                        </li>  
                    </ul>
                </li>

                <li>
                    <a href=""><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                </li>
                <li>
                    <a href=""><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                </li>
                <li>
                    <a href=""><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="">Employees List</a></li>
                        <li><a href="">Leaves</a></li>
                        <li><a href="">Holidays</a></li>
                        <li><a href="">Attendance</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="">Invoices</a></li>
                        <li><a href="">Payments</a></li>
                        <li><a href="">Expenses</a></li>
                        <li><a href="">Taxes</a></li>
                        <li><a href="">Provident Fund</a></li>
                    </ul>
                </li>

            </ul>
            @endif

            @if(Auth::user()->role->id==2)
            <ul> 
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fa fa-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"><span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><span>Level 1</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif 

        </div>
    </div>
</div>