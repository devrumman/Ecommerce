<!DOCTYPE html>
<html lang="en">
<head>

  @include ('backend.includes.header')
  @include ('backend.includes.css')

  
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include ('backend.includes.topbar')

  @include ('backend.includes.nav')


  <!--- Body Content Start --->
  @yield ('adminBodyContant')
  <!--- Body Content End   --->


  @include ('backend.includes.footer')


</div>
<!-- ./wrapper -->

  @include ('backend.includes.script')
  
</body>
</html>
