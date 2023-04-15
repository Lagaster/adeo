<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/adminlte.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/toastr/toastr.min.css') }}">

    <style>
        .message-container{
            width: 100%;
            height: auto;
            position: absolute;
            top: 2;
            right: 0;
            z-index: 9999;
        }
        .message{
            position: absolute;
            top: 0;
            right: 0;
            z-index: 9999;
        }

        #logout-link{
            cursor: pointer;
            background-color: #ffedb0;
            font-size: 14px;
            color: #000;

        }
        #logout-link span{
            margin-right: 10px;
        }
        #logout-link:hover{
            background-color: #f3dc91;
            color: #000;
        }
        .profile-show{
            cursor: pointer;
        }
        .profile-show:hover{
            background-color: #91f391;
            color: #000;
        }
        /**.
        *remove increment and decrement button from number input
        */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .btn-danger{
            background-color: #ff0000;
            border-color: #ff0000;
        }
        .btn-danger:hover{
            background-color: #ff0000;
            border-color: #ff0000;
        }

        .btn-success{
            background-color: #00ff00;
            border-color: #00ff00;
        }
        .btn-success:hover{
            background-color: #00ff00;
            border-color: #00ff00;
        }
        .user-panel .image{
            width: 60px;
            height: 60px;
            overflow: hidden;
            object-fit: cover;
            object-position: center;
        }
        .user-panel .image img{
            max-width: 100%;
            max-height: 100%;
        }

       
        
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('css')



</head>

<body class="hold-transition sidebar-mini">
      

    <!-- Site wrapper -->
    <div class="wrapper"  id="app">

      

        <!-- Navbar -->
        @include('admin_side.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="#" alt="ADEO Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"> ADEO</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image ">
                        <img src="{{ auth()->user()->avatarView() }}" class="img-circle elevation-2"
                            alt="{{ auth()->user()->name }}">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::User()->name }}</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                @include('admin_side.partials.sidebar')
                <!-- /.sidebar-menu -->
                <!-- /.sidebar -->
            </div>
            <!-- /.sidebar -->
            

        </aside>
        <div class="container message-container">
              <!-- Messages -->
        @include('messages')
        </div>

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>{{ config('app.name') }}</b>
            </div>
            <strong>
                &copy; {{ date('Y') }} Developed With <i class="fas fa-heart text-danger"></i> By <a
                    href="https://www.lagaster.org" target="_blank">Lagaster LTD</a>
            </strong>
        </footer>

        {{--  <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>  --}}
     
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin_asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin_asset/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('admin_asset/dist/js/demo.js') }}"></script> --}}

    <!-- Toastr -->
    <script src="{{ asset('admin_asset/plugins/toastr/toastr.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#logout-link').on('click', logout);
        });
        function logout(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to logout from this account!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.getElementById('logout-form');
                    form.submit();
                }
            })
        }
    </script>
    <script>
        function flash(){
            document.getElementById("message").style.animationDuration = "2s";
            document.getElementById('message').style.display = "none";

        }

        setTimeout(flash, 6400);

</script>

    @stack('js')
</body>

</html>
