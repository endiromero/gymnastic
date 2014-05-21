<?php
/* 
 * Creative Commons
 */
include '../../includes/dbconn.php';
$dni = $_POST['dni'];

$sql = "delete from clientes where dni='$dni'";
$rs = $connect->query($sql);
$connect->close();
echo json_encode(array('success'=>true));
//echo 'ok'; 
