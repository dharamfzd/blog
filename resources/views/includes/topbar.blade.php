<nav class="navbar navbar-expand navbar-light my-navbar">
  <!-- Sidebar Toggle (Topbar) -->
  <div type="button" id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">
    <!-- Nav Item - User Information -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('user-profile') }}">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
        @if(Auth::user()->user_profile == null)
        <img class="img-profile rounded-circle" src="{{ asset('image/user/profile.png') }}">
        @else
        <img class="img-profile rounded-circle" src="{{ asset('storage/'.Auth::user()->user_profile) }}">
        @endif
      </a>
    </li>
    <li class="nav-item mr-4">
        <a class="btn btn-primary btn-sm mt-2 text-dark"  href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
  </ul>
</nav>
