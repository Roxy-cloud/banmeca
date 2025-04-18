<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<<<<<<< HEAD
    <title>{{ucfirst(config('app.name', 'App'))}} - {{ucfirst($title ?? '')}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/fav.png')}}">
  

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/feathericon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/icons.min.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
=======
    <title>{{ ucfirst(config('app.name', 'App')) }} - {{ ucfirst($title ?? '') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/fav.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
>>>>>>> e2a8b4e (Primer commit)
    @stack('page-css')
</head>
<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

<<<<<<< HEAD
        <!-- Header -->
        @include('admin.includes.header')
        <!-- /Header -->

        <!-- Sidebar -->
        @include('admin.includes.sidebar')
=======
        <!-- Header dinámico -->
        @if(auth()->user()->hasRole('admin'))
            @include('admin.includes.header')
        @elseif(auth()->user()->hasRole('responsable'))
            @include('responsable.includes.header')
        @elseif(auth()->user()->hasRole('benefactor'))
            @include('benefactor.includes.header')
        @else
            @include('guest.includes.header') <!-- Opcional para usuarios sin rol -->
        @endif
        <!-- /Header -->

        <!-- Sidebar dinámico -->
        @if(auth()->user()->hasRole('admin'))
            @include('admin.includes.sidebar')
        @elseif(auth()->user()->hasRole('responsable'))
            @include('responsable.includes.sidebar')
        @elseif(auth()->user()->hasRole('benefactor'))
            @include('benefactor.includes.sidebar')
        @else
            @include('guest.includes.sidebar') <!-- Opcional para usuarios sin rol -->
        @endif
>>>>>>> e2a8b4e (Primer commit)
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        @stack('page-header')
                    </div>
                </div>
                <!-- /Page Header -->
<<<<<<< HEAD
=======

>>>>>>> e2a8b4e (Primer commit)
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <x-alerts.danger :error="$error" />
                    @endforeach
                @endif

                @yield('content')
            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
    
</body>
<<<<<<< HEAD
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('assets/js/script.js')}}"></script>
=======

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Core JS -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/js/script.js') }}"></script>
>>>>>>> e2a8b4e (Primer commit)
@stack('page-js')
</html>
