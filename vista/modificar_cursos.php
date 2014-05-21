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
        <link rel="stylesheet" href="../css/jquery-ui-1.10.4.custom.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/stylepages.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
            #fm{
                margin:0;
                padding:10px 30px;
            }
            .ftitle{
                font-size:14px;
                font-weight:bold;
                padding:5px 0;
                margin-bottom:10px;
                border-bottom:1px solid #ccc;
            }
            .fitem{
                margin-bottom:5px;
            }
            .fitem label{
                display:inline-block;
                width:80px;
            }
        </style>
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link href="../css/easyui.css" rel="stylesheet" type="text/css"/>
        <link href="../css/icon.css" rel="stylesheet" type="text/css"/>
        <script>
            $(document).ready(function() {
            });
        </script>
        <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="../js/jquery.easyui.min.js" type="text/javascript"></script>
        <script src="../js/easyui-lang-es.js" type="text/javascript"></script>
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
                    <input name="value-pic" id="value-pic" type="hidden" value=""><!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#modificar_clientes" data-toggle="tab">Modificar Cursos</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="modificar_clientes">
                            <table id="dg" title="Clientes" class="easyui-datagrid" style="height:300px"
                                   url="get_users.php"
                                   toolbar="#toolbar" pagination="true"
                                   rownumbers="true" fitColumns="false" singleSelect="true">
                                <thead>
                                    <tr>
                                        <th field="firstname" width="150">Curso</th>
                                        <th field="lastname" width="250">Descripción</th>
                                        <th field="lastname" width="20">Sala</th>
                                        <th field="lastname" width="100">Fecha de inicio</th>
                                        <th field="lastname" width="100">Fecha de fin</th>
                                    </tr>
                                </thead>
                            </table>
                            <div id="toolbar">
                                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar curso</a>
                                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Borrar curso</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            <form>
                                <button type="submit" class="btn btn-default right" name="salir">Salir      </button>
                            </form>
                        </div>
                    </div>
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
        <script type="text/javascript">
            var url;
            function newUser() {
                $('#dlg').dialog('open').dialog('setTitle', 'New User');
                $('#fm').form('clear');
                url = 'save_user.php';
            }
            function editUser() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    $('#dlg').dialog('open').dialog('setTitle', 'Edit User');
                    $('#fm').form('load', row);
                    url = 'update_user.php?id=' + row.id;
                }
            }
            function saveUser() {
                $('#fm').form('submit', {
                    url: url,
                    onSubmit: function() {
                        return $(this).form('validate');
                    },
                    success: function(result) {
                        var result = eval('(' + result + ')');
                        if (result.errorMsg) {
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dlg').dialog('close');        // close the dialog
                            $('#dg').datagrid('reload');    // reload the user data
                        }
                    }
                });
            }
            function destroyUser() {
                var row = $('#dg').datagrid('getSelected');
                if (row) {
                    $.messager.confirm('Confirm', 'Are you sure you want to destroy this user?', function(r) {
                        if (r) {
                            $.post('destroy_user.php', {id: row.id}, function(result) {
                                if (result.success) {
                                    $('#dg').datagrid('reload');    // reload the user data
                                } else {
                                    $.messager.show({// show error message
                                        title: 'Error',
                                        msg: result.errorMsg
                                    });
                                }
                            }, 'json');
                        }
                    });
                }
            }
        </script>
    </body>
</html>
