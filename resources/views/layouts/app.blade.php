<!doctype html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/plant.ico">

    <title>{{ config('EVALUACIÓN DEL IMPACTO AMBIENTAL', 'EVALUACIÓN DEL IMPACTO AMBIENTAL') }}</title>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-wrapper footer-static "data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
        <nav class="header-navbar navbar-expand-lg navbar navbar-border navbar-with-menu floating-nav bg-gradient-success navbar-dark navbar-shadow">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <h4 class="text-center"><span class="text-white">SISTEMA WEB AUTOMATIZADO PARA LA EVALUACIÓN DEL IMPACTO AMBIENTAL EN EL CAMBIO DE USO DE SUELO</span></h4>
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <div class="avatar">
                                    <span class="avatar-content"><i class="avatar-icon feather icon-user"></i></span>
                                    <span class="avatar-status-online"></span>
                                </div> <label class="text-white text-bold-600 text-capitalize">{{ Auth::user()->name }}</label>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <i class="feather icon-power text-bold-600"></i> Cerrar Sesión</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        @guest
        @else
        <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto navbar-brand">
                        <i class="feather icon-menu dark"></i>
                        <h2 class="brand-text mb-0 text-dark text-bold-600">MENÚ</h2>
                    </li>
                    <li class="nav-item nav-toggle"><a class="mb-auto nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon dark" data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    @if(Auth::user()->id_tipo==1)
                    <li class=" navigation-header"><span>Administración de usuarios</span>
                    </li>
                    <li class="nav-item"><a href="{{url("user")}}"><i class="feather icon-users"></i><span class="menu-title">Usuarios</span></a>
                    </li>
                    @endif
                    <li class=" navigation-header"><span>Proyectos</span>
                    </li>
                    <li class="nav-item"><a href="{{url("proyectos")}}"><i class="feather icon-align-justify"></i><span class="menu-title">Proyectos</span></a>
                    </li>
                    <li class=" navigation-header"><span>CATÁLOGOS</span>
                    </li>
                    <li class=" nav-item"><a href=""><i class="feather icon-list"></i><span class="menu-title" data-i18n="Data List">Lista de Catálogos</span></a>
                        <ul class="menu-content">
                            <li><a href="{{url("estado")}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Estados</span></a>
                            </li>
                            <li><a href="{{url("municipio")}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Municipios</span></a>
                            </li>
                            <li><a href="{{url("colonia")}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Colonias</span></a>
                            </li>
                            <li><a href="{{url("compania")}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Compañías</span></a>
                            </li>
                            <li><a href="{{url("tipo")}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Tipo de proyecto</span></a>
                            </li>
                            <li><a href="{{url("criterio")}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Criterios</span></a>
                            </li>
                            <li><a href="{{url("etapa")}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Etapas</span></a>
                            </li>
                            <li><a href="{{url("subsistema")}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Subsistemas</span></a>
                            </li>
                            <li><a href="{{url("variable")}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Variables</span></a>
                            </li>
                            <li><a href="{{url("factor")}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Factores Ambientales</span></a>
                            </li>
                            <li><a href="{{url("asigna")}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">Asigna Criterios</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Main Menu-->
        @endguest

        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-body">
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- BEGIN: Vendor JS-->
        <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="{{asset('app-assets/vendors/js/extensions/tether.min.js')}}"></script>
        <script src="{{asset('app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
        <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
        <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
        <script src="{{asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
        <script src="{{asset('app-assets/vendors/js/extensions/polyfill.min.js')}}"></script>
        <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
        <script src="{{asset('app-assets/js/core/app.js')}}"></script>
        <script src="{{asset('app-assets/js/scripts/components.js')}}"></script>
        <script src="{{asset('app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>
        <script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
        <script src="{{asset('app-assets/js/scripts/modal/components-modal.js')}}"></script>
        <!-- END: Theme JS-->

        <script type="text/javascript">
            window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'apiToken' => Auth::user()->api_token ?? null,
        ]) !!};
            axios.defaults.headers.common = {
                'X-CSRF-TOKEN': Laravel.csrfToken,
                'X-Requested-With': 'XMLHttpRequest',
                'Authorization': 'Bearer '+ Laravel.apiToken,
            };
        </script>
        @yield("scripts")
</body>

</html>
