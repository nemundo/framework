<?php

require __DIR__ . '/../../config.php';


$excel = new \Nemundo\Office\Excel\Document\ExcelDocument();
$excel->filename = 'test.xlsx';   //(new \Nemundo\Project\Path\TmpPath())->addPath('test.xlsx')->getFullFilename();

$data= [];
$data[]='Column1';
$data[]='Column2 Column2 Column2 Column2 Column2 ';

$excel->addBoldRow($data);
$excel->addRow($data);





$excel->writeFile((new \Nemundo\Project\Path\TmpPath())->getFullFilename());



