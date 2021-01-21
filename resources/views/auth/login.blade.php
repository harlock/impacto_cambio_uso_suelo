<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {!! NoCaptcha::renderJs() !!}
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/plant.ico">
    <title>{{ config('EVALUACIÓN DEL IMPACTO AMBIENTAL', 'EVALUACIÓN DEL IMPACTO AMBIENTAL') }}</title>
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/authentication.css">
</head>

<body class="container col-12 justify-content-center">
    <nav class="navbar navbar-expand bg-gradient-success ml-3 mr-3 py-1" style="border-radius: 10px;">
        <div class="collapse navbar-collapse ml-5">
            <h4 class="text-center text-white text-bold-700 ml-5">SISTEMA WEB AUTOMATIZADO PARA LA EVALUACIÓN DEL IMPACTO AMBIENTAL EN EL CAMBIO DE USO DE SUELO</h4>
        </div>
    </nav>
    <br><br><br><br>
    <div class="ml-2">
        <div class="row container justify-content-center pl-5 ml-5">
            <section class="pt-5 ml-5">
                <div class="col-xl-12 col-9 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="../../../app-assets/images/pages/login.png" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-5 justify-content-center">
                                        <div class="card-title">
                                            <h3 class="mb-0 text-bold-600 text-uppercase">Iniciar Sesión</h3>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form action="index.html">
                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input id="email" type="email" class="form-control text-bold @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <label for="user-name">Correo Electrónico*</label>
                                                </fieldset>
                                                <br><br>
                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input id="password" type="password" class="form-control text-bold @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="user-password">Contraseña*</label>
                                                </fieldset>
                                                <br>
                                                <div class="form-group d-flex justify-content-between align-items-center">
                                                    <div class="text-left">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-success">
                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                <span class="">Recordar datos</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                {{--<div class="form-group{{ $errors->has('g-recaptcha-response') ? 'has-error':''}}">
                                                    <div class="col-md-6">
                                                        {!! app('captcha')->display() !!}
                                                        @if ($errors->has('g-recaptcha-response'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>--}}
                                                <a href="{{url("register")}}" class="btn bg-gradient-dark btn-success mr-1 mb-1">Registrate</a>
                                                <button type="submit" class="btn bg-gradient-dark btn-success float-right btn-inline">
                                                    {{ __('Iniciar Sesión') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- END: Content-->

<script src="../../../app-assets/vendors/js/vendors.min.js"></script>
<script src="../../../app-assets/js/core/app-menu.js"></script>
<script src="../../../app-assets/js/core/app.js"></script>
<script src="../../../app-assets/js/scripts/components.js"></script>
</body>
