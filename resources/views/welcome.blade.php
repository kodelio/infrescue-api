<!DOCTYPE HTML>
<html>
<head>
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('/homepage/images/favicon.ico', env('REDIRECT_HTTPS')) }}">
    <title>InfRescue</title>
    <meta name="description" content="Application InfRescue (Projet GL INFRES 9)">
    <link rel="apple-touch-icon" href="{{ asset('/homepage/images/touch/apple-touch-icon.png', env('REDIRECT_HTTPS')) }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/homepage/images/touch/apple-touch-icon-72x72.png', env('REDIRECT_HTTPS')) }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/homepage/images/touch/apple-touch-icon-114x114.png', env('REDIRECT_HTTPS')) }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/homepage/images/touch/apple-touch-icon-144x144.png', env('REDIRECT_HTTPS')) }}">
    <link rel="stylesheet" href="{{ asset('/homepage/css/style.css', env('REDIRECT_HTTPS')) }}">
    <!--[if lt IE 9]>
    <script src="{{ asset('/homepage/js/html5.js', env('REDIRECT_HTTPS')) }}"></script>
    <script src="{{ asset('/homepage/js/respond.js', env('REDIRECT_HTTPS')) }}"></script>
    <![endif]-->
</head>
<body class="no-js">
<div class="main">
    <header>
        <div class="wrap">
            <img src="{{ asset('/homepage/upload/iphone.png', env('REDIRECT_HTTPS')) }}" height="532" width="252" alt="" class="header-img">
            <div class="header-wrapper">
                <h1 style="color: black;"><span>Inf</span>Rescue</h1>
                <p style="color: black; font-size: 28px;    ">Gestion d'hopitaux de campagne</p>
                <div class="buttons-wrapper">
                    <a href="#" class="button" target="_blank">Télécharger l'application</a>
                    <a style="color: black;" href="http://sonar.infrescue.cf" class="button button-stripe" target="_blank">SonarQube</a>
                    @if (Auth::guest())
                        <a style="margin-top: 15px; background: #2ecc71; border: 2px solid white;" href="{{ route('login') }}" class="button">Se connecter</a>
                    @else
                        <a style="margin-top: 15px; background: #e74c3c; border: 2px solid white;" class="button" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Se déconnecter
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>
            </div>
            <!-- /.header-wrapper -->
        </div>
        <!-- /.wrap -->
    </header>
    <div class="spanning">
        <!-- /.promo clearfix -->
        <div class="discover clearfix">
            <div class="wrap" style="">
                <div class="clearfix" style="text-align: center;">
                    <h1>Projet GL INFRES 9</h1>
                    <br />
                    <p>Projet réalisé pour le module Projet GL de la formation INFRES (Ecole des Mines d'Alès)
                    <img src="{{ asset('/homepage/images/infrescue.png', env('REDIRECT_HTTPS')) }}" style="width: 45%;"/>
                    </p>
                </div>
            </div>
            <!-- /.wrap -->
        </div>
        <!-- /.discover clearfix -->
    </div>
    <!-- /.spanning-columns -->
</div>
<!-- /.main -->
<footer>
    <div class="wrap">
        <p>&copy; 2017 <strong>InfRescue (Scott Rayapoullé, Raphael Haltz, Laurent Toson)</strong>, All Rights Reserved</p>
    </div>
    <!-- /.wrap -->
</footer>
<script src="{{ asset('/homepage/js/jquery.js', env('REDIRECT_HTTPS')) }}"></script>
<script src="{{ asset('/homepage/js/library.js', env('REDIRECT_HTTPS')) }}"></script>
<script src="{{ asset('/homepage/js/script.js', env('REDIRECT_HTTPS')) }}"></script>
<script src="{{ asset('/homepage/js/retina.js', env('REDIRECT_HTTPS')) }}"></script>
</body>
</html>