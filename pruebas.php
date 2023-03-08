<?php
$datos=array();
$datos[0]="hola";
$datos[5]="adios";

var_dump(array_keys($datos));
echo "<br>";
var_dump(implode(",",array_values($datos)));