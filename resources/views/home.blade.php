<head>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/plant.ico')}}">
    <title>{{ config('EVALUACIÓN DEL IMPACTO AMBIENTAL', 'EVALUACIÓN DEL IMPACTO AMBIENTAL') }}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
</head>
<body class="container col-11 justify-content-center py-4">
    <nav class="navbar navbar-expand fixed-top bg-gradient-success ml-5 mr-5 py-3" style="border-radius: 10px;">
        <div class="collapse navbar-collapse">
            <h4 class="text-center text-white text-bold-700 ">
                SISTEMA WEB AUTOMATIZADO PARA LA EVALUACIÓN DEL IMPACTO AMBIENTAL EN EL CAMBIO DE USO DE SUELO</h4>
            <ul class="navbar-nav col-2 ml-3">
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white text-bold-600" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white text-bold-600" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </nav>
    <br><br><br><br>
    <div class="container justify-content-center col-12">
            <div class="card">
                <div class="card-content">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="{{asset('app-assets/images/backgrounds/carretera.jpg')}}" width="1380" height="400" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('app-assets/images/backgrounds/Bosque1.png')}}" width="1380" height="400" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('app-assets/images/backgrounds/Bosque2.png')}}" width="1380" height="400" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('app-assets/images/backgrounds/etapas.jpg')}}" width="1380" height="400" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('app-assets/images/backgrounds/grafica1.png')}}" width="1380" height="400" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('app-assets/images/backgrounds/grafica2.png')}}" width="1380" height="400" class="d-block w-100">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card card-body" style="border-radius: 10px;">
                <h4 class="card-text text-justify">
                    El sistema facilita la tarea de evaluar el impacto que sobre el medio ambiente causa una determinada actividad u obra.
                    Está destinado a técnicos especializados y estudiantes, bajo una interfaz amigable, determinando un modelo a seguir práctico e intuitivo.
                    El objetivo consiste en realizar un estudio del impacto que ocasionará la puesta en marcha de un proyecto, obra o actividad sobre el medio
                    ambiente.  A partir de este estudio se intentará predecir y evaluar las consecuencias que la ejecución de dichas actividades puedan ocasionar
                    en el entorno en el que se localiza.
                </h4>
            </div>
        <br>
        <section id="decks">
                <div class="col-12">
                    <div class="card-deck-wrapper">
                        <div class="card-deck mb-5">
                            <div class="card">
                                <div class="card-content mb-3">
                                    <img class="card-img-top img-fluid" src="{{asset('app-assets/images/backgrounds/undraw_environment_iaus.svg')}}" alt="Card image cap" />
                                    <div class="card-body">
                                        <h3 class="text-bold-700 text-uppercase">El origen</h3>
                                        <p class="card-text text-justify">
                                            Ayudar a todos los profesionales del medio ambiente y del territorio que quieran formarse
                                            y desarrollar su actividad profesional. Además, ofrece un espacio para nuevos proyectos y
                                            el registro de datos necesarios para cada evaluación.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="{{asset('app-assets/images/backgrounds/undraw_education_f8ru.svg')}}" alt="Card image cap" />
                                    <div class="card-body">
                                        <h3 class="text-bold-700 text-uppercase">Filosofía</h3>
                                        <p class="card-text text-justify">
                                            Queremos mejorar la competitividad de nuestros asociados y estudiantes, como profesionales
                                            independientes en el proceso de evaluaciones ambientales para el cambio de uso de suelo.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="{{asset('app-assets/images/backgrounds/undraw_task_31wc.svg')}}" alt="Card image cap" />
                                    <div class="card-body">
                                        <h3 class="text-bold-700 text-uppercase">Misión</h3>
                                        <p class="card-text text-justify">
                                            Nuestro objetivo es convertirnos en un referente de evaluaciones ambientales, y en la
                                            formación de profesionales para promocionarlos y apoyarlos en la creación y ejecución de
                                            proyectos optimizando el mayor número de recursos.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="{{asset('app-assets/images/backgrounds/undraw_code_review_l1q9.svg')}}" alt="Card image cap" />
                                    <div class="card-body">
                                        <h3 class="text-bold-700 text-uppercase">Tecnología</h3>
                                        <p class="card-text text-justify">
                                            Implementar tecnologías web para acceder a los recursos de conocimiento disponibles en
                                            internet, manteniendo un buen funcionamiento en la coordinación y ejecución de proyectos,
                                            así como buscar afinación del proceso para mejorar el manejo de información.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content col-8 justify-content-center mb-5">
                            <a type="button" href="{{url("register")}}" class="btn mb-1 btn-success btn-icon btn-lg btn-block"><h4 class="text-bold-700 text-white text-uppercase">Registrate ahora</h4></a>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/components.js')}}"></script>
</body>
