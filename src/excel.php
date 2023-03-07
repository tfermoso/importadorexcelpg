<?php
//llamar a la función con el método estático obtienefilas() y le pasamos el archivo como parámetro
//$resultados = Excel::obtieneFilas($fichero);
require './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class Excel
{
   public $archivo;

    public static function obtieneFilas($archivo)
    {
        
        $spreadsheet = IOFactory::load($archivo);
        $worksheet = $spreadsheet->getSheet(0);
        $datos = $worksheet->toArray();
        $resultado = array_slice($datos, 0,10);

        return $resultado;
    }
    public static function obtieneColumnas($archivo,$array_columnas,$primera_fila)
    { 
        $spreadsheet = IOFactory::load($archivo);
        $worksheet = $spreadsheet->getSheet(0);
        $columnas = $array_columnas;
        $filas = $worksheet->toArray();
     foreach ($filas as $row ) {
        $fila=[];
        foreach ($columnas as $col) {
            $valor=$row[$col]??'';
            $fila[]=$valor;
        }
        $datos[]=$fila;
        $resultado = array_slice($datos, $primera_fila,10);

     }
return $resultado;
    }


}

?>