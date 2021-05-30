<!DOCTYPE html>
<html lang="en" dir="ltr">
  @include('templates.partials._head')
  <body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
  @include('templates.partials._navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->

      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
        @include('templates.partials._sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
      @include('templates.partials._footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

    @include('templates.partials._script')
  </body>
</html>
