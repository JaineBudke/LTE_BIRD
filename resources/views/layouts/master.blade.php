<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('images/icone.png') }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    


    <!-- Styles -->
    <link href="{{ asset('css/bootstrap/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/bootsnav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-preloader.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

</head>
<body>

    <!-- Preloader -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Navbar -->
    <nav class="navbar navbar-default bootsnav navbar-fixed white no-background">
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

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" class="logo logo-display" alt="">
                    <img src="{{ asset('images/footer-logo.png') }}" class="logo logo-scrolled" alt="">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-center">
                    <li><a href="{{ url('/') }}">Início</a></li>                    
                    <li><a href="{{ url('/about') }}">Conheça o BIRD</a></li>
                    <li><a href="{{ url('/explore') }}">Explore</a></li>
                    <li><a href="{{ url('/contact') }}">Contato</a></li>
                </ul>
            </div>

        </div>
    </nav>


    @yield('header')
    @yield('intro')
    @yield('explore')
    @yield('features')


    @yield('content')


    <!-- scroll up -->
    <div class="scrollup">
        <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- End off scroll up -->


    <footer id="footer" class="footer bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default bootsnav footer-menu no-background">
                        <div class="container">  

                            <div class="attr-nav">
                                <ul>
                                    <li><a target="_blank" href="https://www.facebook.com/LTEUFRN/?fref=ts"><i class="fa fa-facebook"></i></a></li>
                                    <li><a target="_blank" href="https://www.flickr.com/photos/154459499@N08/albums"><i class="fa fa-flickr"></i></a></li>
                                    <li><a target="_blank" href="https://www.youtube.com/channel/UCOGVnSKl9elC1e26wJibG3w"><i class="fa fa-youtube-play"></i></a></li>
                                </ul>
                            </div>        


                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-footer">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" class="logo" alt=""></a>
                            </div>
                            
                        </div>   
                    </nav>
                </div>
                <div class="divider"></div>
                <div class="col-md-12">
                    <div class="main_footer text-center p-top-40 p-bottom-30">
                        <p class="wow fadeInRight" data-wow-duration="1s">
                            Desenvolvido por: Laboratório de Tecnologia Educacional (LTE) 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>





    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    <!-- Scripts -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootsnav.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ asset('js/filtrosOA.js') }}"></script>

    <!-- Alert personalizado jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>



</body>
</html>
