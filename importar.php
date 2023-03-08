<?php
require "src/excel.php";
require_once "src/Conexion.php";

$datos = json_decode(file_get_contents('php://input'),true); 
$primera_fila=$datos["primera_fila"];
$columnas=$datos["columnas"];
$columnas_excel=array();
$columnas_bbdd="";
$fichero=dirname(__FILE__) . "/files/".$datos["fichero"];
foreach ($columnas as $key => $value) {
   array_push($columnas_excel,$value[0]);
   $columnas_bbdd.="".$value[1].",";
}
$columnas_bbdd=substr($columnas_bbdd,0,-1);
$registros=Excel::obtieneColumnas($fichero,$columnas_excel,$primera_fila);
$consulta="insert into coches (";
//Generamos nombre columnas

$consulta.=$columnas_bbdd.") values " ;
$datos_filas="";
for ($i=0; $i < count($registros); $i++) { 
    $datos_filas.="('".implode("','",$registros[$i])."'),";
}
$datos_filas=substr($datos_filas,0,-1);
$consulta.=$datos_filas;
$conn=new Conexion();
$result=$conn->executeQuery($consulta);
echo $result;