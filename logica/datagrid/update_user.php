<?php

/* 
 * Creative Commons
 */
$dni = filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_SPECIAL_CHARS);
$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
$apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_SPECIAL_CHARS);
$direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_SPECIAL_CHARS);
$telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$fecha_nacimiento = filter_input(INPUT_POST, 'fecha_nacimiento', FILTER_SANITIZE_SPECIAL_CHARS);

include '../../includes/dbconn.php';

$sql = "UPDATE clientes set nombre='$nombre',apellidos='$apellidos',direccion='$direccion',telefono='$telefono',email='$email',fecha_nacimiento='$fecha_nacimiento' where dni='$dni'";
$rs = $connect->query($sql);
//@mysql_query($sql);
echo json_encode(array(
	'dni' => $dni,
	'nombre' => $nombre,
	'apellidos' => $apellidos,
	'direccion' => $direccion,
	'telefono' => $telefono,
                  'email' => $email,
                  'fecha_nacimiento' => $fecha_nacimiento
));


