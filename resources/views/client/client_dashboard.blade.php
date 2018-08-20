<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>LTE-ADMIN</title>
    <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{ asset('images/icone.png') }}">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('templates/bsbMaterialDesign/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    
    <!-- Custom Css -->
    <link href="{{ asset('templates/bsbMaterialDesign/plugins/node-waves/waves.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/bsbMaterialDesign/plugins/animate-css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/bsbMaterialDesign/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/bsbMaterialDesign/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('templates/bsbMaterialDesign/css/themes/all-themes.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap/bootsnav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-preloader.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style-admin.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">


    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 


</head>


<body class="theme-red">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Estamos quase prontos!</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar" style="background-color: #ffbd60">
    <div class="container">  

        <div class="attr-nav">
            <ul>
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Entrar</a></li>
                <li><a href="{{ url('/register') }}">Cadastrar</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" style="margin-left: 12vw; margin-top: -1vh" role="menu">
                        <li>
                            @if (Auth::user()->admin == 0)
                            <a href="{{ url('dashboard') }}">
                                Área pessoal
                            </a>
                            @else 
                            <a href="{{ url('admin') }}">
                                Área pessoal
                            </a>
                            @endif
                        </li>

                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
            </ul>
        </div>
        

        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ url('/') }}" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="{{ url('/') }}" class="bars"></a>
                <a href="{{ url('/') }}"> <img src="{{ asset('images/logo.png') }}" class="logo logo-scrolled" alt=""></a>
            </div>

        </div>    
    </nav>
    <!-- #Top Bar -->

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">

                @if( Auth::user()->image != NULL )
                    
                    @yield('profile_image')

                @else 
                    <img src="{{ asset('images/user.png') }}" width="48" height="48" alt="User" />
                @endif
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU DE NAVEGAÇÃO</li>
                    @yield('menu_first')
                        <a href="{{ url('/dashboard') }}">
                            <i class="material-icons">check</i>
                            <span>Salvos</span>
                        </a>
                    </li>

                    @yield('menu_second')
                        <a href="{{ url('/client/meus_objetos') }}">
                            <i class="material-icons">edit </i>
                            <span>Meus Recursos</span>
                        </a>
                    </li>

                    @yield('menu_third')
                        <a href="{{ url('/client/historico') }}">
                            <i class="material-icons">view_list</i>
                            <span>Histórico</span>
                        </a>
                    </li>

                    @yield('menu_fourth')
                        <a href="{{ url('/client/perfil') }}">
                            <i class="material-icons">camera</i>
                            <span>Meu perfil</span>
                        </a>
                    </li>

                    @yield('menu_fifth')
                        <a href=" {{ url('/explore') }} ">
                            <i class="material-icons">search </i>
                            <span>Explorar</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 LTE - BIRD
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>


    <!-- Page inicial (Salvos) -->
    @yield('initial')

    <!-- Page Meus Objetos -->
    @yield('my_objects')

    <!-- Page Historico -->
    @yield('historic')

    <!-- Page Meu Perfil -->
    @yield('profile')

    <!-- Page Registro de Nova OA -->
    @yield('register')




    
    <script src="{{ asset('js/filtrosOA.js') }}"></script>


    <script src="{{ asset('js/vendor/jquery-1.11.2.min.js') }}"></script>

    <script src="{{ asset('js/bootsnav.js') }}"></script>

    <!-- Jquery Core Js -->
    <script src="{{ asset('templates/bsbMaterialDesign/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap Core Js -->
    <script src="{{ asset('templates/bsbMaterialDesign/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <script src="{{ asset('templates/bsbMaterialDesign/plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="{{ asset('templates/bsbMaterialDesign/plugins/jquery-steps/jquery.steps.js') }}"></script>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    
    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('templates/bsbMaterialDesign/plugins/node-waves/waves.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('templates/bsbMaterialDesign/js/admin.js') }}"></script>
    <script src="{{ asset('templates/bsbMaterialDesign/js/pages/forms/form-wizard.js') }}"></script>

    
</body>

</html>
