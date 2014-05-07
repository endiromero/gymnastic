<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>GymNastic :: Control de Acceso</title>
        <meta name="description" content="Aplicación para Gestión de Gymnasio">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    </head>
    <body>
        <!--[if lt IE 7]>
    <p class="browsehappy">Está utilizando un navegador<strong>anticuado</strong> . Por favor <a href="http://browsehappy.com/">actualice su navegador</a> para mejorar su experiencia.</p>
<![endif]-->
        <div class="container">
            
            <?php
            $user = 'pruebas';
            $pass = '1234';
                if(isset($_GET['txtuser'])){
                    if($_GET['txtuser'] == $user && $_GET['txtpass'] == $pass){
                        session_start();
                        $_SESSION['user'] = $user;
                        header("Location: vista/main.php");
                    }else{
                        print("<script>alert('Datos Incorrectos. Intentelo nuevamente');</script>");
                    }
                }
            ?>

            <form class="form-signin" name="login">
                <div class="h2_id"><h2 class="form-signin-heading titulo_login">Login de Acceso</h2></div>
                <input type="text" class="form-control" placeholder="usuario" name="txtuser">
                <input type="password" class="form-control" placeholder="password" name="txtpass">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> <span class="titulo_login">Recordar mis datos</span>
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">ingresar</button>
            </form>

        </div> 
    </body>
</html>