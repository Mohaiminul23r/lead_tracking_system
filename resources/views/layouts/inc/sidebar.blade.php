<!--sidebar start-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse " style="overflow: hidden;" tabindex="5000">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li class="mt">
                <a class="" href="{{ url('/home')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>

            </li>
            <li>
                <hr style="margin:0px">
                <hr style="margin-top:2px; margin-bottom:0px">
            </li>

            <li>                
               
            </li>

             @role(['admin','HR','CEO','MD'])

            <ul class="list-unstyled components">   
                <li class="active">
                    <a href="#setting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Settings  <b class="caret"></b></a>
                    <ul class="collapse list-unstyled" id="setting">

                        <li><a href="{{ url('countries')}}">Country</a></li>
                        <li><a href="{{ url('cities')}}">City</a></li>
                        <li><a href="{{ url('addresses')}}">Address</a></li>
                        <li><a href="{{ url('roles')}}">Role</a></li>  
                        <li><a href="{{ url('permissions')}}">Permission</a></li>  
                    </ul> 
                </li>
            </ul>
            @endrole

            @role(['admin','HR','CEO','MD'])
            <ul class="list-unstyled components"> 
                <li class="active">
                    <a href="#employee" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Employee  <b class="caret"></b></a>
                    <ul class="collapse list-unstyled" id="employee">

                        <li><a href="{{ url('companies') }}">Company</a></li>
                        <li><a href="{{ url('offices') }}">Office</a></li>
                        <li><a href="{{ url('departments') }}">Department</a></li>
                        <li><a href="{{ url('designations') }}">Designation</a></li>
                        <li><a href="{{ url('employeetypes') }}">Employee Type</a></li>
                        <li><a href="{{ url('employees') }}">Employee</a></li>         
                    </ul> 
                </li>
            </ul>  
            @endrole

             @role(['admin','manager', 'HR','CEO','MD'])
            <ul class="list-unstyled components"> 
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Project  <b class="caret"></b></a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">

                        <li><a href="{{ url('projectcategories') }}">Project Category</a></li>
                        <li><a href="{{ url('projects') }}">Project Information</a></li>
                        <li><a href="{{ url('projectslabs') }}">Project Slab</a></li>        
                    </ul> 
                </li>
            </ul>
            @endrole

           @role(['admin', 'manager', 'HR','Marketing','sales','CEO','MD'])
                <li><a href="{{ url('clients') }}">Client Information</a></li>
                <li><a href="{{ url('callhistories') }}">Call history</a></li>
                <li><a href="{{ url('followups') }}">Follow Up</a></li>
                <li><a href="{{ url('schedules') }}">Schedule</a></li>
            @endrole

            @role(['admin', 'manager', 'HR','sales','CEO','MD'])
                <li><a href="{{ url('meetings') }}">Meeting</a></li>
                <li><a href="{{ url('sales') }}">Sales</a></li>
            @endrole


            <ul class="list-unstyled components"> 
                <li class="active">
                    <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reports   <b class="caret"></b></a>
                    <ul class="collapse list-unstyled" id="reports">
                         @role(['admin', 'manager', 'HR','CEO','MD'])
                            <li><a href="{{ url('report/salesIndex') }}">Sales Report</a></li>
                            <li><a href="{{ url('report/projectsIndex') }}">Project wise Report</a></li>
                            <li><a href="{{ url('report/meetingsIndex') }}">Meeting Report</a></li>
                        @endrole

                         @role(['admin', 'manager', 'HR','Marketing','sales','CEO','MD'])
                            <li><a href="{{ url('report/employeesIndex') }}">Employee reports</a></li>
                        @endrole 

                    </ul> 
                </li>
            </ul>  
           
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
