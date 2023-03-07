<?php 
require_once('config.php');

class Conexion{

    private $conn;

    public function __construct(){
        $candenaPDO="pgsql:host=".HOST.";port=5432;dbname=".DB_NAME.";";
        $this->conn=new PDO($candenaPDO,DB_USER,DB_PASS);   
        
    }
    public function getcolumns($tabla){
        $consulta="SELECT column_name FROM information_schema.columns WHERE table_schema = 'public' AND table_name   = '".$tabla."' ";
        $resultado=$this->conn->query($consulta);
        $col_tem=$resultado->fetchAll(PDO::FETCH_ASSOC);
        $columnas=array();
        for ($i=0; $i < count($col_tem); $i++) { 
            array_push($columnas,$col_tem[$i]["column_name"]);
        }
        return $columnas;
    }
    
};
