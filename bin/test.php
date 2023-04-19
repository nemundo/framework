<?php

use Nemundo\Office\Excel\Reader\ExcelReader;

require "config.php";

$filename = 'D:\Tmp_Git\regiocockpit\tmp\bauzonenstatistik.xlsx';

$reader = new ExcelReader();
//$reader->setSheet('asdf');
$reader->filename = $filename;

//(new \Nemundo\Core\Debug\Debug())->write($reader->getFileFormat());

foreach ($reader->getData() as $excelRow) {

    /*$excelRow->hasValueByNumber(0);
    $excelRow->getValueByNumber(0);*/

}
