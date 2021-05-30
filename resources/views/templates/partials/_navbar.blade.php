<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-info">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="{{route('dashboard')}}" style="color: blue">
      {{-- <img src="{{asset('assets/images/LOGO DOLAN PEMALANG.png')}}" alt="logo"/> --}}
        Admin
    </a>
    <a class="navbar-brand brand-logo-mini" href="{{route('dashboard')}}" style="color: blue">
      {{-- <img src="{{asset('assets/images/LOGO TUGU PEMALANG CLEAR 100.png')}}" alt="logo"/> --}}
      A
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="mdi mdi-bell-outline"></i>
          <span class="count bg-danger">0</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle nav-profile" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <img src="../../images/faces/face1.jpg" alt="image">
          <span class="d-none d-lg-inline">{{Auth::user()->name}}</span>
        </a>
        <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
          <!-- <a class="dropdown-item" href="#">
            <i class="mdi mdi-cached mr-2 text-success"></i>
            Activity Log
          </a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
            <i class="mdi mdi-logout mr-2 text-primary"></i>
            Signout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
    <span class="mdi mdi-menu"></span>
  </button>
  </div>
</nav>
