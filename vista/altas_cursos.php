<?php
session_start();

if (isset($_GET['salir'])) {
    header('Location: main.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../index.php');
}

if (!isset($_SESSION['user'])) {
    print("<script>alert('Usted no tiene permiso para ver esta página. Necesita ser usuario autorizado');</script>");
    print("<script>location.href = '../index.php'; </script>");
} else {
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
        <script src="../assets/dropzone.js" type="text/javascript"></script>
        <link href="../css/dropzone.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../css/jquery-ui-1.10.4.custom.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/stylepages.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <script>
            $(document).ready(function() {

                $.ionSound({
                    sounds: [
                        "camera_flashing_2"
                    ],
                    path: "../ion/sounds/",
                    multiPlay: true,
                    volume: "1.0"
                });

                var pic = new SayCheese('#boxpicture', {
                    snapshots: true
                });
                pic.start();

                pic.on('error', function(error) {
                    $('#with-camera').css('visibility', 'hidden');
                    $('#without-camera').css('visibility', 'visible');

                });

                var width = 320, height = 240;

                $('#take-pic').click(function(e) {
                    $.ionSound.play("camera_flashing_2");
                    pic.takeSnapshot(width, height);
                    return false;
                });

                pic.on('snapshot', function(snapshot) {
                    var img = $('<img id="pic">');
                    quality = snapshot.toDataURL('image/jpeg');
                    img.attr('src', quality);
                    img.appendTo('#preview-pic');
                    $('input[name=value-pic]').val(quality);
                });

                $('#discard').click(function() {
                    $('#preview-pic').empty();
                });

                $("#fecha_inicio").datepicker(
                        {
                            dateFormat: "dd/mm/yy",
                            dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabádo"],
                            dayNamesMin: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                            changeMonth: true,
                            changeYear: true,
                            yearRange: '-100:+0',
                            monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                            showAnim: 'slideDown'
                        }
                );
                $("#fecha_fin").datepicker(
                        {
                            dateFormat: "dd/mm/yy",
                            dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabádo"],
                            dayNamesMin: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                            changeMonth: true,
                            changeYear: true,
                            yearRange: '-100:+0',
                            monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                            showAnim: 'slideDown'
                        }
                );
            });
        </script>
        <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">Usted esta usando un navegador<strong>obsoleto</strong>. Por favor <a href="http://browsehappy.com/">actualice su navegador</a> para mejorar su experiencia.</p>
        <![endif]-->
        <!--status bar-->
        <?php include("../includes/status_bar.php"); ?>

        <!-- Menu Principal -->
        <?php include ("../includes/menu_principal.php"); ?>

        <div class="container container-aplication">
            <div class="row">
                <div class="col-md-12">
                    <!-- Formulario de Altas -->
                    <form role="form">
                        <input name="value-pic" id="value-pic" type="hidden" value=""><!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#datos_personales" data-toggle="tab">Alta Cursos</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="datos_personales">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3><span class="label label-primary">Datos del curso</span></h3>                                  
                                        <p></p>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="curso">Curso</label>
                                                    <input type="text" class="form-control" id="nombre" name="txtnombrecurso" placeholder="Nombre del curso..">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="curso">Sala</label>
                                                    <select id="curso" class="form-control">
                                                        <option>Eliga una sala...</option>
                                                        <option value="1">Sala 1</option>
                                                        <option value="2">Sala 2</option>
                                                        <option value="3">Sala 3</option>
                                                        <option value="4">Sala 4</option>
                                                        <option value="5">Sala 5</option>
                                                        <option value="6">Sala 6</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="descripcion">Descripción del Curso</label>
                                                    <input type="text" class="form-control" id="descripcion" name="txtdescripcion" placeholder="Descripción del curso...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="fecha_inicio">Fecha de inicio</label>
                                                    <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="Fecha de inicio">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="direccion">Fecha de fin</label>
                                                    <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="Fecha de fin">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="col-md-6">
                                        <div class="panel panel-primary" id="fotos_salas">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Gymnastic Salas</h3>
                                            </div>
                                            <div class="panel-body">
                                                Foto Sala y breve descripción de la equipación en esta sala. Ejemplo: Sala con pista de baile y suelo de madera.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-default">Alta del curso</button>
                                <button type="reset" class="btn btn-default">Restablecer</button>
                                <button type="button" class="btn btn-default">Consula rápida</button>
                                <button type="submit" class="btn btn-default" name="salir">Salir</button>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">
                                        <h4><span class="label label-default">Cursos</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <footer>
                    <p>Gymnastic Copyrigth</p>
                </footer>
            </div> 
        </div><!-- /container --><!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.js"><\/script>');</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>
    </body>
</html>
