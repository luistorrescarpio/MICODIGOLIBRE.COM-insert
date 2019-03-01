<?php 
//Script para conexión con base de datos en Mysql
include("db_script/heasy_mysql.php");
// Get Params Client
$obj = (object)$_REQUEST;

//Ejecutar Consultas en MYSQL desde PHP
switch ($obj->action) {
  case 'registerBook':
    $r = query("INSERT INTO libro (codigo, titulo, autor, editorial, ejemplares, fech_registro)
    			VALUES('{$obj->codigo}','{$obj->titulo}','{$obj->autor}','{$obj->editorial}','{$obj->ejemplares}','{$obj->fech_registro}')");
    server_res($r);
    break;  
}
?>
