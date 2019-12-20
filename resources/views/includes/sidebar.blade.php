
@if(Auth::user()->role == 1)

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">School</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/images/logo.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/home" class="d-block">Kalgidhar School</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/home" class="nav-link">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('students.create')}}" class="nav-link">
                        <i class="fa fa-archive nav-icon"></i>
                        <span>Registration</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('students.index')}}" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <span>Students</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('fee.index')}}" class="nav-link">
                        <i class="fas fa-money-check-alt nav-icon"></i>
                        <span>Fee Manager</span>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-search nav-icon"></i>
                        <p>
                            Generate Reports
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/report?by=caste" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Caste Class Wise</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/report?by=gender" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gender Class Wise</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/report?by=religion" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Religion Class Wise</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/report?by=students" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Students Class Wise</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-search nav-icon"></i>
                        <p>
                            Search By Station
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/stationSearch" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Search Here</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-search nav-icon"></i>
                        <p>
                            Certificates
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('birth-certificates.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Birth Certificates</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('character-certificates.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Character Certificates</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('transfer-certificates.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transfer Certificate</p>
                            </a>
                        </li>
                    </ul>

                </li>




                <li class="nav-item">
                    <a href="{{route('prints.index')}}" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <span>Export Student Lists</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('deactivated.index')}}" class="nav-link">
                        <i class="fas fa-times-circle nav-icon"></i>
                        <span>Deactivated Students</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('classes.index')}}" class="nav-link">
                        <i class="fa fa-location-arrow nav-icon"></i>
                        <span>Classes</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('stations.index')}}" class="nav-link">
                        <i class="fa fa-plane nav-icon"></i>
                        <span>Stations</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('streams.index')}}" class="nav-link">
                        <i class="fa fa-search nav-icon"></i>
                        <span>Streams</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('concession.index')}}" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <span>Concessions</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('gate-passes.index')}}" class="nav-link">
                        <i class="fas fa-money-check-alt nav-icon"></i>
                        <span>Issue Gate Pass</span>
                    </a>
                </li>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

@endif




@if(Auth::user()->role == 0)

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">School</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/images/logo.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/home" class="d-block">Kalgidhar School</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('students.index')}}" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <span>Students</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('gate-passes.index')}}" class="nav-link">
                        <i class="fas fa-money-check-alt nav-icon"></i>
                        <span>Issue Gate Pass</span>
                    </a>
                </li>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

@endif