<?php

namespace NemundoTest\Office\Excel;

use Nemundo\Core\Debug\Debug;
use Nemundo\Office\Excel\Reader\AbstractLargeExcelReader;
use Nemundo\Office\Excel\Reader\ExcelRow;

class TestLargeExcelReader extends AbstractLargeExcelReader
{

    protected function loadReader()
    {

        $this->filename = 'C:\git\swisstainable\tmp\swisstainable\09_2024\241001_Swisstainable_Reporting.xlsx';
        $this->sheetName = 'Übersicht Partnerbetriebe';
        $this->lineOfStart = 3;

    }


    protected function onRow(ExcelRow $excelRow)
    {

        (new Debug())->write($excelRow->getValue('organisation'));

        $this->stopReading();


    }


}