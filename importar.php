<?php
require "src/excel.php";

$datos = json_decode(file_get_contents('php://input'),true); 
$primera_fila=$datos["primera_fila"];
$columnas=$datos["columnas"];
$fichero=$datos["fichero"];
var_dump($fichero);
