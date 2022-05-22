<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('font/font/flaticon.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <style></style>
  <body>
    <div id="wrapper">
      <div class="overlay"></div>
      <!-- Sidebar -->
      @include('includes.sidebar')
      <!-- /#sidebar-wrapper -->
      <!-- Page Content -->
      <div id="page-content-wrapper">
        <div id="content">
          <div class="container-fluid p-0 px-lg-0 px-md-0">
            <!-- Topbar -->
            @include('includes.topbar')
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid px-lg-4">
              <div class="row">
                <div class="col-md-12 mt-lg-4 mt-4">
                  @if(Auth::user()->user_profile == null)
                    <div class="alert alert-warning alert-dismissible fade show py-1">
                      <button type="button" class="close py-1" data-dismiss="alert">&times;</button>
                      <small> Your profile picture is not uploaded. click here - <a href="{{ route('user-profile') }}"> upload picture </a> </small>
                    </div>
                  @endif
                  @if (Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show py-1">
                    <button type="button" class="close py-1" data-dismiss="alert">&times;</button>
                    <small>{{ Session::get('success') }}</small>
                  </div>
                  @endif
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h4 class="h3 mb-0 text-gray-800">@yield('title')</h4>
                    @yield('right-button')
                  </div>
                  <div class="col-md-12">
                    @yield('content')
                  </div>
                  <!-- column -->
                </div>
              </div>
              <!-- /.container-fluid -->
            </div>
          </div>
        </div>
        <!-- /#page-content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#bar').toggleClass('open');
          $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
          $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
          });
        });
      </script>
      @yield('Java-script')
  </body>
</html>
