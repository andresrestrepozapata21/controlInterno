<?php
//$db_host = "localhost";
//$db_user = "mipgenlinea_candelaria2021";
//$db_pass = "!4Z&V[_&[lih";
//$db_name = "mipgenlinea_candelaria2021";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "bd_candelaria_2021";
$conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);

if (!$conexion->set_charset("utf8")) {
    printf("", $conexion->error);
} else {
   printf("", $conexion->character_set_name());
}

if ($conexion->connect_errno) {
    printf("Fall�� la conexi��n 2022: %s\n", $mysqli->connect_error);
    exit();
}
?>