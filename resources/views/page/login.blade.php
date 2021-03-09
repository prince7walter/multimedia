<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="Cynthia" content="Dashboard">
    <title>Sp-Connexion</title>

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
<div id="login-page">
    <div class="container">

        <form class="form-login" action="{{route('loginpost')}}" method="POST">
            @csrf
            @method('POST')
            <h2 class="form-login-heading">Sp-Connection</h2>
            <div class="login-wrap">
                <input type="text" class="form-control" name="login" placeholder="login" autofocus>
                <br>
                <input type="password" class="form-control" name="password" placeholder="Mot de Passe">
                <label class="checkbox">

                </label>
                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Valider</button>
                <hr>

            </div>
        </form>
    </div>
</div>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="{{asset('lib/jquery.backstretch.min.js')}}"></script>
<script>
    $.backstretch("{{asset('img/login-bg.jpg')}}", {
        speed: 500
    });
</script>
</body>

</html>

