<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title>UNA</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon-32x32.png')}}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya:400,400i,500,500i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+SC">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="{{ asset('css/Button-Change-Text-on-Hover.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Features-Clean.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('css/Footer-Clean-1.css') }}">-->
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/particles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_cadconta.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tooltipster-punk.css') }}">
    <link rel="stylesheet" href="{{ asset('css/selectize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/banner_carrousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/box.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/box2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer_una.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav_una.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pag_sobre.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/texto_banner.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Features-Boxed-Grafico.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dist/css/tooltipster.bundle.min.css') }}">
  
   <style>
    .dropdown-menu>li>a, .dropdown-menu>li>a:visited {
        background-color: #fff;
        color:#000 !important;
    }
    .dropdown-menu>li>a:hover, .dropdown-menu>li>a:active,
    .dropdown-menu>li>a::selection, .dropdown-menu>li>a::-moz-selection {
        background-color: #63347d;
        color:#eee !important;
    }
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #8438b2;
        color:white
    }
    </style>
    @yield('styles')

    <script>
        $(document).ready(function() {
            $('.tooltips').tooltipster();
        });
</script>
    
    
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand navbar-link" href="{{ route('index') }}"><img id="logo" src="{{ URL::asset('assets/img/logouna-branco.png') }}"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar1">
                <ul class="nav navbar-nav main">
                                    
                    <li><a id="home" href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('ecossistema') }}">Ecossistema</a></li>
                    <li><a href="{{ route('sobre') }}">Sobre</a></li>
                    <li><a href="{{ route('una_numeros') }}">UNA em Números</a></li>
                    <li><a href="{{ route('una_retrato') }}">UNA em Retrato</a></li>
                    <li><a href="{{ route('una_temas') }}">UNA em Temas</a></li>
                    <!--<li><a href="{{ route('contato') }}">Contato</a></li>--> 
                    @guest
                        <li><a href="{{ route('cadastro') }}">Cadastro</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" 
                            data-toggle="dropdown" role="button" 
                            aria-expanded="false" aria-haspopup="true">
                                Minha Página <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                    $orgCat = Auth::user()->tipo == 2 ? "Iniciativa" : "Organização";
                                ?>
                                <li><a href="{{ route('form') }}">Minha {{$orgCat}}</a></li>
                                <li><a href="{{ route('myaccount') }}">Meu Perfil</a></li>
                                <li><a href="{{ route('dashboard') }}">Meus relacionamentos</a></li>
                            </ul>
                        </li>
                    @endguest
                    
                    @guest
                    <li><a id="btn_login" href="#" data-toggle="modal" data-target="#myModal">Entrar</a></li>
                    @else
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
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- modal contact form -->
    <div id="myModal" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <form role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body" id="myModalBody">
                    @if ($errors->any())
                    <script type="text/javascript">
                        $('#myModal').modal('show');
                    </script>
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                        </ul>
                    </div><br />
                    @endif   
                    <div class="form-group{{ $errors->has('email_login') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <i class="glyphicon glyphicon-user"></i>
                            <input id="email_login" type="email" class="form-control" name="email" placeholder="Seu email" value="{{ old('email') }}" required autofocus />
                            @if ($errors->has('email_login'))     
                                <span class="help-block">       
                                    <strong>{{ $errors->first('email_login') }}</strong>      
                                </span>     
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <i class="glyphicon glyphicon-lock"></i>
                            <input id="password_login" type="password" class="form-control" name="password" required placeholder="Senha">
                            @if ($errors->has('password'))      
                                <span class="help-block">       
                                    <strong>{{ $errors->first('password') }}</strong>       
                                </span>     
                            @endif
                        </div>
                    </div>
                    <a class="btn btn-link" href="{{ route('password.request') }}">     
                        Esqueceu sua senha?     
                    </a>
                    <label>     
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar      
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn login
                        ">Login</button>
                </div>
            </div> <!--/ modal content -->
            </form> <!--/ login form -->
        </div>
    </div> <!--/ modal contact form -->

    <!-- Banner Carrousel-->
    
    
     <div class="carousel slide" data-ride="carousel" id="carousel-1">
        <div class="carousel-inner" role="listbox">
            <div class="item active"><img class="img-responsive" src="{{ asset('assets/img/foto_banner3.jpg') }}" width="100%" height="auto">
                <div class="carousel-caption"><p class="text-left" id="texto_banner">Ecossistema de Iniciativas para equidade de genêro e empoderamento da mulher.</p></div>
            </div>
            <div class="item"><img class="img-responsive" src="{{ asset('assets/img/foto_banner4.jpg') }}" width="100%" height="auto">
                <div class="carousel-caption"><p class="text-left" id="texto_banner">Ecossistema de Iniciativas para equidade de genêro e empoderamento da mulher.</p></div>
            </div>
            <div class="item"><img class="img-responsive" src="{{ asset('assets/img/foto_banner5.jpg') }}" width="100%" height="auto">
                <div class="carousel-caption"><p class="text-left" id="texto_banner">Ecossistema de Iniciativas para equidade de genêro e empoderamento da mulher.</p></div>
            </div>
            <div class="item"><img class="img-responsive" src="{{ asset('assets/img/foto_banner6.jpg') }}" width="100%" height="auto">
                <div class="carousel-caption"><p class="text-left" id="texto_banner">Ecossistema de Iniciativas para equidade de genêro e empoderamento da mulher.</p></div>
            </div>
            <div class="item"><img class="img-responsive" src="{{ asset('assets/img/foto_banner7.jpg') }}" width="100%" height="auto">
                <div class="carousel-caption"><p class="text-left" id="texto_banner">Ecossistema de Iniciativas para equidade de genêro e empoderamento da mulher.</p></div>
            </div>
        </div>
        <div><a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel-1" role="button" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i><span class="sr-only">Next</span></a></div>
        <ol
            class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
            <li data-target="#carousel-1" data-slide-to="3"></li>
            <li data-target="#carousel-1" data-slide-to="4"></li>
            </ol>
    </div>

    @yield('content')

    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row footer">
                    <div class="col-md-3 col-sm-4 item" id="logo_footer"><a href="#"> <img src="{{ asset('assets/img/una_logo.png') }}"></a></div>
                    <div class="col-md-3 col-sm-4 item" id="footer_about">
                        <h3>Proponentes</h3>
                        <div class="row">
                            <div class="col-md-12" id="logo1_proponente"><a href="http://www.onumulheres.org.br" target="_blank"> <img src="{{ asset('assets/img/logo_onumulheres.png') }}" id="logo_onu"></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="logo2_proponente"><a href="https://womanity.org" target="_blank"> <img src="{{ asset('assets/img/logo_womanity.png') }}" id="logo_onu"></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><a href="https://brazilfoundation.org/?lang=pt-br" target="_blank"> <img src="{{ asset('assets/img/logo_brazil.png') }}" id="logo3_proponente"></a></div>
                            <div class="col-md-12"><a href="http://www.institutocea.org.br" target="_blank"> <img src="{{ asset('assets/img/logocea.png') }}" id="logo4_proponente"></a></div>
                        </div>
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-4 item" id="localizacao">
                        <h3>Contato</h3>
                        <ul>
                            <li><a href="mailto:contato@u1na.org">contato@u1na.org</a></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-11 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">UNA© 2018</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/validator.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/validatortel.js') }}" type="text/javascript"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bs-animation.js') }}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js" type="text/javascript"></script>
<script src="{{ asset('js/jquery.backstretch.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.backstretch.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.maskedinput.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('js/particles.js') }}" type="text/javascript"></script> -->
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" type="text/javascript"></script>
<script src="{{ asset('js/retina-1.1.0.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/textarea.js') }}" type="text/javascript"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{ asset('js/tooltipster.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.validate.pt-br.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.cep.min.js') }}"></script>
<script src="{{ asset('js/selectize.js') }}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('js/campobranco.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/dist/js/tooltipster.bundle.min.js') }}" type="text/javascript"></script>

@yield('scripts')

</body>
</html>
