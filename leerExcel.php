<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet=IOFactory::load("datos.xlsx");
//$worksheet=$spreadsheet->getSheetByName('Worksheet');
$worksheet=$spreadsheet->getSheet(0);
//$valor=$worksheet->getCell('A1')->getValue();
$datos=$worksheet->toArray();
var_dump($datos);