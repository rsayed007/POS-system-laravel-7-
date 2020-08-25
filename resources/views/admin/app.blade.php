<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
        @include('admin.layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      @include('admin.layouts.top_bar')
      <!-- Main Content -->

        @section('main_content')
            
        @show

      <!-- End of Main Content -->

        @include('admin.layouts.footer')
</body>

</html>
