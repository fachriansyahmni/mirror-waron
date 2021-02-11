<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="/" class="simple-text logo-normal">
        Kios.Ku
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        @if (Auth::guard('admin')->check())
        <li class="nav-item {{ (request()->routeIs('admin.home')) ? 'active' : '' }}">
          <a class="nav-link" href="{{route('admin.home')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{ (request()->routeIs('admin.manage')) ? 'active' : '' }}">
          <a class="nav-link" href="{{route('admin.manage')}}">
            <i class="material-icons">store</i>
            <p>Manage Warung</p>
          </a>
        </li>
        <li class="nav-item {{ (request()->routeIs('admin.mancat')) ? 'active' : '' }}">
          <a class="nav-link" href="{{route('admin.mancat')}}">
            <i class="material-icons">category</i>
            <p>Manage Category</p>
          </a>
        </li>
        <li class="nav-item {{ (request()->routeIs('admin.resetOwner')) ? 'active' : '' }}">
          <a class="nav-link" href="{{route('admin.resetOwner')}}">
            <i class="material-icons">account_circle</i>
            <p>Reset Password Owner</p>
          </a>
        </li>
        @elseif(Auth::guard('warung')->check())
        <li class="nav-item {{ (request()->routeIs('user.dashboard')) ? 'active' : '' }}">
          <a class="nav-link" href="{{route('user.dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{ (request()->routeIs('user.warung')) ? 'active' : '' }}">
          <a class="nav-link" href="{{route('user.warung')}}">
            <i class="material-icons">shop</i>
            <p>Warung</p>
          </a>
        </li>
        @endif
      </ul>
    </div>
  </div>