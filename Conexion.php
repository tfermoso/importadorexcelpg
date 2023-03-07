<?php
require_once("config.php");
class Conexion
{
    private $conn;
    public function __construct()
    {
        $cadenaconexion="pgsql:host=".HOST.";port=".PORT.";dbname=".DB_NAME.";";
        $this->conn=new PDO($cadenaconexion,DB_USER,DB_PASS);
    }
    public function getColumns($tabla){
        $consulta="SELECT column_name                  --Seleccionamos el nombre de columna
        FROM information_schema.columns     --Desde information_schema.columns
        WHERE table_schema = 'public'       --En el esquema que tenemos las tablas en este caso public
        AND table_name   = '".$tabla."'";
        $result=$this->conn->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
