<!-- Header -->
<div class="header">
    <!-- Logo -->
    <div class="header-left">
        <a href="{{route('dashboard')}}" class="logo">
            <img src="{{asset('assets/img/Caritas.jpg')}}" alt="">
        </a>
        <a href="{{route('dashboard')}}" class="logo logo-small">
            <img src="{{asset('assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->
    
    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>
    
    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->
    
    <!-- Header Right Menu -->
    <ul class="nav user-menu">
        <!-- User Menu -->
        <h4 class="page-title">Bienvenid@ {{auth()->user()->name}}!</h4>
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" 
                        src="{{  auth()->user()->avatar  }}" 
                        width="31" 
                        alt="">
                </span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        <img src="{{ auth()->user()->avatar }}" 
                            alt="" 
                            class="avatar-img rounded-circle">
                    </div>
                    <div class="user-text">
                        <h6>{{ auth()->user()->name }}</h6>
                    </div>
                </div>
                
                <a class="dropdown-item" href="{{route('profile')}}">Perfil</a>
                @can('view-settings')
                    <a class="dropdown-item" href="{{route('settings')}}">Configuracion</a>
                @endcan
                
                <a href="javascript:void(0)" class="dropdown-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn">Salir</button>
                    </form>
                </a>
            </div>
        </li>
        <!-- /User Menu -->
    </ul>
    <!-- /Header Right Menu -->
</div>
<!-- /Header -->
