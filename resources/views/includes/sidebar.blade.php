<nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
  <div class="simplebar-content" style="padding: 0px;">
    <a class="sidebar-brand" href="index.html">
      <span class="align-middle">{{ env('APP_NAME') }}</span>
    </a>
    <ul class="navbar-nav align-self-stretch">
      <!-- <li class="sidebar-header"> Main </li> -->
      <li class="">
        <a href="{{ route('blog-list') }}" class="nav-link text-left {{ Request::segment(1) == 'dashboard' && Request::segment(2) == '' ? 'active' : '' }}" role="button" aria-haspopup="true" aria-expanded="false"> Dashboard </a>
      </li>
      <li class="">
        <a href="{{ route('add-blog') }}" class="nav-link text-left {{ Request::segment(2) == 'blog' && Request::segment(3) == 'add' ? 'active' : '' }}" role="button"> Add Blog </a>
      </li>
  </div>
</nav>
