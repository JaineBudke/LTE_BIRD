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


    <link href="{{ asset('css/style-admin.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

    

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
    <nav class="navbar">

        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ url('/') }}" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="{{ url('/') }}" class="bars"></a>
                <a class="navbar-brand" href="{{ url('/') }}">BIRD - ADMINISTRAÇÃO</a>
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
                    <img src="{{ asset('images/user.png') }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
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
                    </div>
                </div>
            </div>

            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU DE NAVEGAÇÃO</li>
                    @yield('menu_first')
                        <a href="{{ url('/admin') }}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

                    @yield('menu_second')
                        <a href="{{ url('/admin/cadastrar') }}">
                            <i class="material-icons">assignment</i>
                            <span>Cadastrar RED</span>
                        </a>
                    </li>

                    @yield('menu_third')
                        <a href="{{ url('/admin/lista') }}">
                            <i class="material-icons">view_list</i>
                            <span>Visualizar REDs</span>
                        </a>
                    </li>
                    @yield('menu_fourth')
                        <a href="{{ url('/admin/avaliar') }}">
                            <i class="material-icons">done_all</i>
                            <span>Avaliar REDs</span>
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


    <!-- Page inicial -->
    @yield('content')

    <!-- Page cadastro de OA -->
    @yield('form')

    @yield('detail')

    @yield('register')




    <script src="{{ asset('js/filtrosOA.js') }}"></script>


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
