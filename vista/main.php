<?php
session_start();

if(isset($_GET['logout'])){
    session_destroy();
    header('Location: ../index.php');
}

if (!isset($_SESSION['user'])) {
    print("<script>alert('Usted no tiene permiso para ver esta página. Necesita ser usuario autorizado');</script>");
    print("<script>location.href = '../index.php'; </script>");
}else{
    $user = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Gymnastic</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../js/jquery-1.8.2.min.js"></script>
        <script src="../js/jquery.validationEngine.js"></script>
        <script src="../js/jquery-ui-1.10.4.custom.min.js"></script>
        <script src="../assets/say-cheese.js"></script>
        <script src="../js/ion.sound.js"></script>
        <link rel="stylesheet" href="../css/jquery-ui-1.10.4.custom.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/stylemain.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        
        <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">Usted esta usando un navegador<strong>obsoleto</strong>. Por favor <a href="http://browsehappy.com/">actualice su navegador</a> para mejorar su experiencia.</p>
        <![endif]-->

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Gymnastic Aplication</a>
                </div>
                <div class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" role="form" >
                        <div class="form-group">
                            <h4><span class="label label-warning navbar-right">Usuario Online: <?php echo $user ?></span></h4>
                        </div>
                        <div class="form-group">
                            
                        </div>
                        <button type="submit" name="logout" class="btn btn-default navbar-right">Logout</button>
                    </form>        
                </div>
            </div>
        </div>

        <!-- Menu Principal -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Menú Principal</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Archivo<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="altas_clientes.php">Altas clientes</a></li>
                                <li><a href="#">Modificar clientes</a></li>
                                <li class="divider"></li>
                                 <li><a href="#">Altas Monitores</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Preferencias</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Acerca de..</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consultas<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Por ID</a></li>
                                <li><a href="#">Por datos personales</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informes<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Altas</a></li>
                                <li><a href="#">Bajas</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Fisico de un cliente</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Búsqueda rápida..">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>                
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container container-aplication">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div> 
        </div><!-- /container --><!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.js"><\/script>');</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b, o, i, l, e, r) {
                b.GoogleAnalyticsObject = l;
                b[l] || (b[l] =
                        function() {
                            (b[l].q = b[l].q || []).push(arguments);
                        });
                b[l].l = +new Date;
                e = o.createElement(i);
                r = o.getElementsByTagName(i)[0];
                e.src = '//www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e, r);
            }(window, document, 'script', 'ga'));
            ga('create', 'UA-XXXXX-X');
            ga('send', 'pageview');
        </script>
    </body>
</html>
