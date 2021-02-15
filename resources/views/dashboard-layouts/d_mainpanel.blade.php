<div class="main-panel">
    @include('dashboard-layouts.d_topnav')
    <div class="content">
        @include('dashboard-layouts.alert-msg')
        @yield('header-content')
        @yield('content')
    </div>
  </div>