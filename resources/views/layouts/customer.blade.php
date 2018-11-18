<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kertabumi Batik</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/fe-vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('vendor/fe-css/shop-homepage.css') }}" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        @if(Auth::guard('customer')->check())
        <a class="navbar-brand" href="{{ route('customer.home') }}">Kertabumi Batik</a>
        @else
        <a class="navbar-brand" href="{{ route('home') }}">Kertabumi Batik</a>
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            @if(Auth::guard('customer')->check())
            <li class="nav-item <?php if($thisPage=='Home') {echo "active";}?>">
              <a class="nav-link" href="{{ route('customer.home') }}">Home</a>
            </li>
            <li class="nav-item <?php if($thisPage=='About') {echo "active";}?>">
              <a class="nav-link" href="{{ route('about.home') }}">About</a>
            </li>
            <li class="nav-item <?php if($thisPage=='Testimoni') {echo "active";}?>">
              <a class="nav-link" href="{{ route('testimoni.home') }}">Testimoni</a>
            </li>
            <li class="nav-item <?php if($thisPage=='Contact') {echo "active";}?>">
              <a class="nav-link" href="{{ route('contact.home') }}">Contact</a>
            </li>
            @else
            <li class="nav-item <?php if($thisPage=='Home') {echo "active";}?>">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item <?php if($thisPage=='About') {echo "active";}?>">
              <a class="nav-link" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item <?php if($thisPage=='Testimoni') {echo "active";}?>">
              <a class="nav-link" href="{{ route('testimoni') }}">Testimoni</a>
            </li>
            <li class="nav-item <?php if($thisPage=='Contact') {echo "active";}?>">
              <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
            @endif
            
            
            @if(Auth::guard('customer')->check())
            <li class="dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                  {{ Auth::user()->nama }} <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu dropdown-alert">
                  <li><a href="{{ route('customer.home') }}/profil/{{ Auth::user()->id }}"><i class="fa fa-user fa-fw"></i> Profil Pengguna</a>
                  </li>
                  <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ubah Kata Sandi</a>
                  </li>
                  <li class="divider"></li>
                  <li><a href="{{ route('customer.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                  </li>
              </ul>
              <!-- /.dropdown-user -->
            </li>
            @else
            <li class="nav-item <?php if($thisPage=='SignUp') {echo "active";}?>">
              <a class="nav-link" href="signup">SignUp</a>
            </li>
             <li class="nav-item <?php if($thisPage=='Login') {echo "active";}?>">
              <a class="nav-link" href="login">Login</a>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          @if(Auth::guard('customer')->check())
          <h1 class="my-4">Kategori</h1>
          <div class="list-group">
            <a href="{{ route('bs.home') }}" class="list-group-item">Best Seller</a>
            <a href="{{ route('np.home') }}" class="list-group-item">New Product</a>
            <a href="{{ route('ap.home') }}" class="list-group-item">All Product</a>
          </div>
          <br>
          <div class="list-group">
            <a href="#" class="list-group-item">Keranjang</a>
            <a href="#" class="list-group-item">Transaksi</a>
            <a href="#" class="list-group-item">Chat</a>
          </div>
          @else
          <h1 class="my-4">Kategori</h1>
          <div class="list-group">
            <a href="{{ route('bs') }}" class="list-group-item">Best Seller</a>
            <a href="{{ route('np') }}" class="list-group-item">New Product</a>
            <a href="{{ route('ap') }}" class="list-group-item">All Product</a>
          </div>
          @endif
        </div>
        <!-- /.col-lg-3 -->

        @yield('content')

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; 2018</p>
        <p class="m-0 text-center text-white">Harish Abdurrohman | 155410003 | <a href="http://akakom.ac.id">AKAKOM</a></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/fe-vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/fe-vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
     
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>

  </body>
</html>
