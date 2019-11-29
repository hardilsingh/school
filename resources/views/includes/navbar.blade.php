<!--left-fixed -navigation-->
<aside class="sidebar-left">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> School<span class="dashboard_text">Management System</span></a></h1>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="{{route('students.create')}}">
                        <i class="fa fa-archive"></i> <span>Registration <span class="badge badge-success">Ready</span></span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="{{route('students.index')}}">
                        <i class="fa fa-female"></i>
                        <span>Students <span class="badge badge-success">Ready</span></span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('fee.index')}}">
                        <i class="fa fa-money"></i>
                        <span>Fee Manager <span class="badge badge-success">Ready</span></span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('classes.index')}}">
                        <i class="fa fa-location-arrow"></i>
                        <span>Classes <span class="badge badge-success">Ready</span></span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('sections.index')}}">
                        <i class="fa fa-location-arrow"></i>
                        <span>Sections <span class="badge badge-success">Ready</span></span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('stations.index')}}">
                        <i class="fa fa-plane"></i>
                        <span>Stations <span class="badge badge-success">Ready</span></span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('streams.index')}}">
                        <i class="fa fa-search"></i>
                        <span>Streams <span class="badge badge-success">Ready</span></span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('concession.index')}}">
                        <i class="fa fa-user"></i>
                        <span>Concessions <span class="badge badge-success">Ready</span></span>
                    </a>
                </li>


                <li class="header">Certificates</li>
                <li><a href="{{route('transfer-certificates.index')}}"><i class="fa fa-angle-right text-red"></i> <span>Transfer Certificate</span></a></li>
                <li><a href="{{route('birth-certificates.index')}}"><i class="fa fa-angle-right text-yellow"></i> <span>Birth Certificate <span class="badge badge-success">Ready</span></span></a></li>
                <li><a href="{{route('character-certificates.index')}}"><i class="fa fa-angle-right text-aqua"></i> <span>Character Certificate <span class="badge badge-success">Ready</span></span></a></li>
                <li><a href="{{route('annual-certificates.index')}}"><i class="fa fa-angle-right text-aqua"></i> <span>Annual Ceritificate</span></a></li>
                <li><a href="{{route('gate-passes.index')}}"><i class="fa fa-angle-right text-aqua"></i> <span>Gate Pass <span class="badge badge-success">Ready</span></span></a></li>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
</div>
<!--left-fixed -navigation-->