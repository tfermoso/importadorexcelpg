<?php
require './vendor/autoload.php';
require_once './src/excel.php';
require_once './src/Conexion.php';
$columnas=array();
$productos=array();
if (isset($_FILES['archivo'])) {
    $ext = strtolower(substr($_FILES['archivo']['name'], -4));
    $new_name = date("Y.m.d-H.i.s");
    $archivoSubido = $_FILES['archivo'];
    $dir = './files/';
    $url_insert = dirname(__FILE__) . "/files";
    if (!file_exists($url_insert)) {
        mkdir($url_insert, 0777, true);
    };
    move_uploaded_file($_FILES['archivo']['tmp_name'], $dir.$new_name.'.xlsx');
    $archivo=$dir.$new_name.'.xlsx';
    $productos=Excel::obtieneFilas($archivo);
    //var_dump($filas_excel);
    $conn=new Conexion();
    $columnas=$conn->getcolumns("coches");


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Archivo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div>
        <h1><strong>Subir Archivos</strong></h1>
    </div>
    <form class="form-control" action="" method="post" enctype="multipart/form-data">
        <label class="form-group" for=""></label>
        <input class="form-group" type="file" name="archivo" id="archivo">
        <button class="btn btn-primary" type="submit">Subir archivo</button>
    </form>
    <hr>
    <table class="table table-bordered table-dark">
        <thead>
            <tr>

                <?php
                $numero_columnas=count($productos[0]);
                for ($i = 0; $i < $numero_columnas; $i++) {
                    echo '    <th scope="col">
                            <select class="form-control columna" id="' . $i . '">
                                <option></option>';

                    for ($j = 0; $j < count($columnas); $j++) {
                        echo '<option>' . $columnas[$j] . '</option>';
                    }

                    echo '     </select>
                        </th>';
                }

                ?>

            </tr>
        </thead>
        <tbody>

            <?php

            for ($i = 0; $i < count($productos); $i++) {
                echo '<tr>';

                for ($j = 0; $j < $numero_columnas; $j++) {
                    echo '  <td>' . $productos[$i][$j] . '</td>';
                }

                echo '</tr>';
            }



            ?>

        </tbody>
    </table>

       
</body>

</html>