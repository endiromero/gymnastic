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
                    $('#with-camera').css('visibility','hidden');
                    $('#without-camera').css('visibility','visible');

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

                $("#fecha_nacimiento").datepicker(
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

                document.getElementById("uploadBtn").onchange = function() {
                    document.getElementById("uploadFile").value = this.value;
                };
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
                            <li class="active"><a href="#datos_personales" data-toggle="tab">Alta Monitores</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="datos_personales">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3><span class="label label-primary">Datos Personales Monitores</span></h3>                                  
                                        <p></p>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="nombre">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" name="txtnombre" placeholder="Ingrese nombre">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="apellidos">Apellidos</label>
                                                    <input type="text" class="form-control" id="apellidos" name="txtapellidos" placeholder="Ingrese apellidos ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                                    <input type="text" class="form-control" id="fecha_nacimiento" name="txtfecna" placeholder="Seleccione fecha de nacimiento">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone">Teléfono</label>
                                                    <input type="telephone" class="form-control" id="phone" name="txtphone" placeholder="Ingrese número de teléfono">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="correo">Correo Eléctronico</label>
                                                    <input type="email" class="form-control" id="correo" name="txtcorreo" placeholder="Ingrese correo eléctronico">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="direccion">Dirección</label>
                                                    <input type="text" class="form-control" id="direccion" name="txtlocalidadnac" placeholder="Ingrese dirección completa ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="dni">D.N.I.</label>
                                                    <input type="email" class="form-control" id="dni" name="txtcorreo" placeholder="Ingrese DNI">
                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p></p>
                                        <div class="row">                                           
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4><span class="label label-primary">Fotografía</span></h4>
                                                        <div class="panel panel-default">
                                                            <div id="boxpicture" class="boxpictures">
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12" id="without-camera">
                                                        <input id="uploadFile" placeholder="Seleccione un archivo" disabled="disabled" />
                                                        <div class="fileUpload btn btn-default">
                                                            <span>Examinar</span>
                                                            <input id="uploadBtn" type="file" class="upload" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" id="with-camera">
                                                        <button id="take-pic" type="button" class="btn btn-default btn-sm pull-right">
                                                            Hacer foto <span class="glyphicon glyphicon-camera"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4><span class="label label-primary">Vista previa</span></h4>
                                                        <div id="preview-pic" class="panel panel-default boxpictures">
                                                        </div>  
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button id="save" type="button" class="btn btn-default btn-sm pull-left">
                                                            Guardar <span class="glyphicon glyphicon-floppy-disk"></span>
                                                        </button>  
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button id="discard" type="button" class="btn btn-default btn-sm pull-right">
                                                            Descartar <span class="glyphicon glyphicon-remove"></span>
                                                        </button>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="datos_fisicos_origen">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3><span class="label label-primary">Datos Fisicos Origen</span></h3>
                                        <h4><span class="label label-primary">Condición Fisica</span></h4>
                                        <p></p>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="estatura">Estatura</label>
                                                    <input type="text" class="form-control" id="estatura" name="txtestatura" placeholder="Ingrese la estatura en cm">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="peso">Peso</label>
                                                    <input type="text" class="form-control" id="peso" name="txtpeso" placeholder="Ingrese el peso en kg">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="imc">I.M.C.</label>
                                                    <input type="text" class="form-control" id="imc" name="txtimc" placeholder="Indice de masa corporal..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-default">Guardar</button>
                                <button type="reset" class="btn btn-default">Restablecer</button>
                                <button type="button" class="btn btn-default">Consula rápida</button>
                                <button type="submit" class="btn btn-default" name="salir">Salir</button>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">
                                        <h4><span class="label label-default">Monitores</span></h4>
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
