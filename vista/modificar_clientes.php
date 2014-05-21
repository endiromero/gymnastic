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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/jquery.easyui.min.js" type="text/javascript"></script>
        <script src="../js/datagrid-filter.js" type="text/javascript"></script>
        <script src="../js/easyloader.js" type="text/javascript"></script>
        <script src="../js/easyui-lang-es.js" type="text/javascript"></script>
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
                <input name="value-pic" id="value-pic" type="hidden" value=""><!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#modificar_clientes" data-toggle="tab">Modificar Clientes</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="modificar_clientes">
                        <table id="dg" title="Clientes" class="easyui-datagrid" style="height:380px" url="../logica/datagrid/get_users.php" toolbar="#toolbar" data-options="
                               rownumbers:true,
                               singleSelect:true,
                               autoRowHeight:true,
                               pagination:true,
                               pageSize:10">
                            <thead>
                                <tr>
                                    <th field="dni" width="100">D.N.I.<br/>
                                        <input type="text" id="filtro-dni" class="filtro">
                                    </th>
                                    <th field="nombre" width="130">Nombre<br/>
                                        <input type="text" id="filtro-nombre" class="filtro">
                                    </th>
                                    <th field="apellidos" width="160">Apellidos<br/>
                                        <input type="text" id="filtro-apellidos" class="filtro">
                                    </th>
                                    <th field="direccion" width="190">Dirección</th>
                                    <th field="telefono" width="140">Teléfono<br/>
                                        <input type="text" id="filtro-telefono" class="filtro">
                                    </th>
                                    <th field="email" width="150">E-Mail<br/>
                                        <input type="text" id="filtro-email" class="filtro">
                                    </th>               
                                    <th field="fecha_nacimiento" width="130">Fecha de nacimiento</th>
                                    <th field="fecha_alta" width="120">Fecha de alta</th>
                                </tr>
                            </thead>
                        </table>
                        <div id="toolbar">
                            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar cliente</a>
                            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Borrar cliente</a>
                        </div>
                        <div id="dlg" class="easyui-dialog" style="width:400px;height:350px;padding:10px 20px"
                             closed="true" buttons="#dlg-buttons">
                            <div class="ftitle">Información del Usuario</div>
                            <form id="fm" method="post" novalidate>
                                <div class="fitem">
                                    <input type="hidden" name="dni" class="easyui-validatebox">
                                </div>
                                <div class="fitem">
                                    <label>Nombre:</label>
                                    <input name="nombre" class="easyui-validatebox" required="true">
                                </div>
                                <div class="fitem">
                                    <label>Apellidos:</label>
                                    <input name="apellidos" class="easyui-validatebox" required="true">
                                </div>
                                <div class="fitem">
                                    <label>Dirección:</label>
                                    <input name="direccion" class="easyui-validatebox" required="true">
                                </div>
                                <div class="fitem">
                                    <label>Teléfono:</label>
                                    <input name="telefono">
                                </div>
                                <div class="fitem">
                                    <label>Email:</label>
                                    <input name="email" class="easyui-validatebox" validType="email">
                                </div>
                                <div class="fitem">
                                    <label>Fecha nacimiento:</label>
                                    <input name="fecha_nacimiento" class="easyui-datebox" required data-options="validType:'md[\'10/11/2012\']'"></input>
                                </div>
                            </form>
                        </div>
                        <div id="dlg-buttons">
                            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">Guardar</a>
                            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
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
        /*function newUser() {
         $('#dlg').dialog('open').dialog('setTitle', 'Nuevo Usuario');
         $('#fm').form('clear');
         url = 'save_user.php';
         }*/
        function editUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlg').dialog('open').dialog('setTitle', 'Editar datos del cliente');
                $('#fm').form('load', row);
                url = '../logica/datagrid/update_user.php';
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
                        $('#dlg').dialog('close');
                        $('#dg').datagrid('reload');
                    }
                }
            });
        }
        function destroyUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirmar', 'Esta seguro que desea borrar este usuario?', function(r) {
                    if (r) {
                        var dni = row.dni;
                        $.ajax({
                            type: "POST",
                            url: "../logica/datagrid/destroy_user.php",
                            data: "dni=" + dni,
                            dataType: "json",
                            error: function() {
                                alert("error petición ajax");
                            },
                            success: function(data) {
                                if (data.success) {
                                    $('#dg').datagrid('reload');
                                } else {
                                    $.messager.show({
                                        title: 'Error',
                                        msg: data.errorMsg
                                    });
                                }
                            }
                        });
                    }
                });
            }
        }
        function pagerFilter(data) {
            if (typeof data.length == 'number' && typeof data.splice == 'function') {    // is array
                data = {
                    total: data.length,
                    rows: data
                }
            }
            var dg = $(this);
            var opts = dg.datagrid('options');
            var pager = dg.datagrid('getPager');
            pager.pagination({
                onSelectPage: function(pageNum, pageSize) {
                    opts.pageNumber = pageNum;
                    opts.pageSize = pageSize;
                    pager.pagination('refresh', {
                        pageNumber: pageNum,
                        pageSize: pageSize
                    });
                    dg.datagrid('loadData', data);
                }
            });
            if (!data.originalRows) {
                data.originalRows = (data.rows);
            }
            var start = (opts.pageNumber - 1) * parseInt(opts.pageSize);
            var end = start + parseInt(opts.pageSize);
            data.rows = (data.originalRows.slice(start, end));
            return data;
        }

        $(function() {
            $('#dg').datagrid({loadFilter: pagerFilter});

            $('#dg').datagrid({
                autoRowHeight: false,
                rownumbers: true,
                fitColumns: false,
                singleSelect: true,
                autoRowHeight: false,
                        remoteSort: false
            });

            $(document).on('keyup', '.filtro', function() {
                // $( '#dg' ).datagrid(); 
                var filtrados = new Array();
                var filtro = $(this).val();
                var campoFiltro = $(this).closest('td').attr('field');
                var registros = $('#dg').datagrid('getRows');

                for (var i = 0; i < registros.length; i++) {
                    if (registros[ i ][ campoFiltro ].toLowerCase().indexOf(filtro.toLowerCase()) != -1) {
                        filtrados.push(registros[ i ]);
                    }
                }

                $('#dg').datagrid('loadData', filtrados);
               // console.log(filtrados);
            });

            /* prevenir la funcionalidad de sorting al entrar a los campos de filtros */
            $('.filtro').click(function(event) {
                if (event.stopPropagation) {
                    event.stopPropagation();   // W3C
                }
                else {
                    event.cancelBubble = true; // IE
                }
            });
        });
    </script>
</body>
</html>
