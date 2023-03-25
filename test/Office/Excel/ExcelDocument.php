<?php

require __DIR__ . '/../../config.php';


$excel = new \Nemundo\Office\Excel\Document\ExcelDocument();
$excel->filename = 'D:\Tmp\test.xlsx';


$data= [];
$data[]='Column1';
$data[]='Column2 Column2 Column2 Column2 Column2 ';

$excel->addBoldRow($data);
$excel->addRow($data);

$excel->writeFile();



