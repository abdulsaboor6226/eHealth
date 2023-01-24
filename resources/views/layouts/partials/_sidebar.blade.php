<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @role('super_admin|admin|staff|patient')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#patient" aria-expanded="false" aria-controls="patient">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Patient</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="patient">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('patient.index')}}"> Listing </a></li>
                    </ul>
                </div>
            </li>
        @endrole
        @role('super_admin|admin|staff|doctor')
        <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#doctor" aria-expanded="false" aria-controls="doctor">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Doctor</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="doctor">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{route('doctor.index')}}"> Listing </a></li>
                    </ul>
                </div>
            </li>
        @endrole
        @role('super_admin|admin|staff')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#staff" aria-expanded="false" aria-controls="staff">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Staff</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="staff">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('staff.index')}}"> Listing </a></li>
                </ul>
            </div>
        </li>
        @endrole
    </ul>
</nav>
