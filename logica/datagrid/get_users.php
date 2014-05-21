<?php
/* 
 * Creative Commons
 */

include '../../includes/dbconn.php';
$sql = 'SELECT * FROM clientes;';
$rs = $connect->query($sql);

$result = array();
while ($row = mysqli_fetch_object($rs)) {
    array_push($result, $row);
}
$connect->close();
echo json_encode($result);