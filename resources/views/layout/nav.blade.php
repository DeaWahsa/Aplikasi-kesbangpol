<ul class="sidebar-nav" id="sidebar-nav">
   <li class="nav-item ">
        <a class="nav-link @if($menu != 'dashboard') collapsed @endif" href="{{url('dashboard')}}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-heading">Master Data</li>
    <li class="nav-item">
        <a class="nav-link @if($menu != 'masterdata') collapsed @endif" data-bs-target="#components-nav"
            data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse @if($menu == 'masterdata') show @endif" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{url('persyaratan')}}"  class="@if($submenu == 'persyaratan') active @endif">
                    <i class="bi bi-circle"></i><span>Persyaratan</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-heading">Pendaftaran</li>

    <li class="nav-item">
        <a class="nav-link @if($menu != 'pendaftaran') collapsed @endif" data-bs-target="#components1-nav"
            data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Pendaftaran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components1-nav" class="nav-content collapse @if($menu == 'pendaftaran') show @endif"
            data-bs-parent="#sidebar-nav">
            <li>
                <a class="@if($submenu == 'form-pendaftaran') active @endif" href="{{url('form-pendaftaran')}}">
                    <i class="bi bi-circle"></i>
                    <span>Form Pendaftaran</span>
                </a>
            </li>
            <li>
                <a href="{{url('daftar-pendaftaran')}}" class=" @if($submenu == 'daftar-pendaftaran') active @endif">
                    <i class="bi bi-circle"></i><span>Daftar Pendaftar</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Login</span>
        </a>
    </li>

</ul>