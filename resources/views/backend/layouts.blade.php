@include('backend.partial._header')
  <body class="app sidebar-mini">
    <div class="loader-bg">
      <div class="loader-p"></div>
  </div>
  @include('backend.partial.image-modal')
  
    <!-- Navbar-->
    @include('backend.partial._topbar')
    <!-- Sidebar menu-->
    @include('backend.partial._sidebar')
    <main class="app-content">
      @yield('breadcrumb')
      @yield('content')
    </main>
    @include('backend.partial._footer')
  </body>
</html>