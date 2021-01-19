<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {!! NoCaptcha::renderJs() !!}

    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/plant.ico">
    <title>{{ config('EVALUACIÓN DEL IMPACTO AMBIENTAL', 'EVALUACIÓN DEL IMPACTO AMBIENTAL') }}</title>
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/authentication.css">
</head>

<body class="container col-12 justify-content-center">
    <nav class="navbar navbar-expand  bg-gradient-success ml-3 mr-3 py-1" style="border-radius: 10px;">
        <div class="collapse navbar-collapse ml-5">
            <h4 class="text-center text-white text-bold-700 ml-5">SISTEMA WEB AUTOMATIZADO PARA LA EVALUACIÓN DEL IMPACTO AMBIENTAL EN EL CAMBIO DE USO DE SUELO</h4>
        </div>
    </nav>

    <div class="ml-2">
        <div class="row container justify-content-center pl-5 ml-5">
            <section class="pt-5 ml-5">
                <div class="col-xl-12 col-12 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-5 pr-5 py-0">
                                <img src="../../../app-assets/images/pages/register.jpg" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                <div class="card rounded-0 mb-0 p-2">
                                    <div class="card-header pb-4 justify-content-center">
                                        <div class="card-title">
                                            <h4 class="mb-0 text-bold-600 text-uppercase">CREA TU CUENTA</h4>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body pt-0">
                                            <form action="index.html">
                                                <div class="form-label-group">
                                                    <input id="name" type="text" class="form-control text-capitalize @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <label for="inputName">Nombre</label>
                                                </div>

                                                <div class="form-label-group">
                                                    <input id="apusuario" type="text" name="apusuario" class="form-control text-capitalize" required autocomplete="apusuario" autofocus>
                                                    <label for="inputName">Primer apellido</label>
                                                </div>

                                                <div class="form-label-group">
                                                    <input id="amusuario" type="text" name="amusuario" class="form-control text-capitalize" required autocomplete="amusuario" autofocus>
                                                    <label for="inputName">Segundo apellido</label>
                                                </div>

                                                <div class="form-label-group">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <label for="inputEmail">Correo Electrónico</label>
                                                </div>

                                                <div class="form-label-group">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <label for="inputPassword">Contraseña</label>
                                                </div>

                                                <div class="form-label-group">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    <label for="inputConfPassword">Confirmar contraseña</label>
                                                </div>

                                                <div class="form-group{{ $errors->has('g-recaptcha-response') ? 'has-error':''}}">
                                                    <div class="col-md-6">
                                                        {!! app('captcha')->display() !!}
                                                        @if ($errors->has('g-recaptcha-response'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-label-group">
                                                    <button class="btn bg-gradient-dark btn-success float-right btn-inline mb-50">
                                                        {{ __('Registrarse') }}
                                                    </button>
                                                </div>
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
