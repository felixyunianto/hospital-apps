<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-category">
      <span class="nav-link">Main Menu</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('dashboard')}}">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Dashboard</span>
        @if(Request::is('dashboard'))
        <span class="badge badge-info">D</span>
        @endif
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('tour')}}">
        <i class="icon-picture menu-icon"></i>
        <span class="menu-title">Layanan Kesehatan</span>
          @if(Request::is('pariwisata') || Request::is('pariwisata/tambah') || Request::is('pariwisata/*'))
        <span class="badge badge-info">LK</span>
        @endif
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('users')}}">
        <i class="icon-people menu-icon"></i>
        <span class="menu-title">Pengguna</span>
          @if(Request::is('pengguna'))
        <span class="badge badge-info">P</span>
        @endif
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('comment')}}">
        <i class="icon-bubble menu-icon"></i>
        <span class="menu-title">Komentar</span>
          @if(Request::is('komentar'))
        <span class="badge badge-info">K</span>
        @endif
      </a>
    </li>
  </ul>
</nav>
