<?php

require __DIR__ . '/../../config.php';


$excel = new \Nemundo\Office\Excel\Document\ExcelDocument();
$excel->filename = 'test.xlsx';   //(new \Nemundo\Project\Path\TmpPath())->addPath('test.xlsx')->getFullFilename();
$excel->overwriteExistingFile = true;

$excel->add



$excel->renameActiveSheet('Bla0');

$excel->addSheet('bla1');

$data= [];
$data[]='Column1';
$data[]='Column2 Column2 Column2 Column2 Column2 ';

$excel->addBoldRow($data);
$excel->addRow($data);


$excel->addSheet('bla2');

$data= [];
$data[]='Column1';
$data[]='Column2 Column2 Column2 Column2 Column2 ';

$excel->addBoldRow($data);
$excel->addRow($data);


$excel->writeFile((new \Nemundo\Project\Path\TmpPath())->getFullFilename());



