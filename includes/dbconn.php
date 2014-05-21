<?php

/* 
 * Creative Commons
 */
include ('configuration.php');

$connect = new mysqli($host, $user, $password, $database);

if ($connect->connect_errno) {
    die('Error de conexión: ' . '(' . $conexion->connect_errno . ') ' . $conexion->connect_error);
    exit();
}


