<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/')}}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content @if($submenu === 'persyaratan')show @endif" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{url('persyaratan')}}" @if($submenu === 'persyaratan') class="active" @endif>
                    <i class="bi bi-circle"></i><span>Persyaratan</span>
                </a>
            </li>
        </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Pendaftaran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{url('form-pendaftaran')}}">
                    <i class="bi bi-circle"></i><span>Form Pendaftaran</span>
                </a>
            </li>
            <li>
                <a href="{{url('daftar-pendaftaran')}}">
                    <i class="bi bi-circle"></i><span>Daftar Pendaftaran</span>
                </a>
            </li>
        </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Login</span>
        </a>
    </li>

</ul>