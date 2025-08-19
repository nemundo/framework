<?php

namespace NemundoTest\Office\Excel;

use Nemundo\Core\Debug\Debug;
use Nemundo\Office\Excel\Reader\AbstractLargeExcelReader;
use Nemundo\Office\Excel\Reader\ExcelRow;

class TestLargeExcelReader extends AbstractLargeExcelReader
{

    protected function loadReader()
    {

        //$this->filename = 'C:\test\alturos\revenue_luzern_2018-01-01-2025-08-11.xlsx';
        $this->filename='C:\test\alturos\test1.xlsx';
        //$this->sheetName = 'Übersicht Partnerbetriebe';
        $this->sheetName = 'Items in detail';
        //$this->lineOfStart = 3;

    }


    protected function onRow(ExcelRow $excelRow)
    {

        //(new Debug())->write($excelRow);
        (new Debug())->write($excelRow->getValue('order id'));

        /*(new Debug())->write($excelRow->getValue('organisation'));
        $this->stopReading();*/


    }


}