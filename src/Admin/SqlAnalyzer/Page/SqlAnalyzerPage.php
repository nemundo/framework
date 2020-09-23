<?php

namespace Nemundo\Admin\SqlAnalyzer\Page;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer\SqlAnalyzerReader;
use Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery\SqlAnalyzerQueryReader;
use Nemundo\Admin\SqlAnalyzer\Site\SqlAnalyzerImportSite;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Com\TableBuilder\TableCell;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Type\Number\Number;

use Nemundo\Package\Bootstrap\Table\BootstrapTable;

class SqlAnalyzerPage extends AdminTemplate
{

    public function getContent()
    {


        $btn = new AdminSiteButton($this);
        $btn->content = 'Import';
        $btn->site = SqlAnalyzerImportSite::$site;

        $table = new BootstrapTable($this);

        $header = new TableHeader($table);
        $header->addText('Table Name');
        $header->addText('Select Type');
        $header->addText('Key');
        $header->addText('Rows');
        $header->addText('Extra');

        $queryReader = new SqlAnalyzerQueryReader();
        foreach ($queryReader->getData() as $queryRow) {

            $row = new TableRow($table);
            $cell = new TableCell($row);
            $cell->colspan = 5;
            $cell->content = $queryRow->sqlQuery;

            $analyzerReader = new SqlAnalyzerReader();
            $analyzerReader->filter->andEqual($analyzerReader->model->sqlQueryId, $queryRow->id);

            foreach ($analyzerReader->getData() as $analyzerRow) {

                $row = new TableRow($table);
                $row->addText($analyzerRow->sqlTableName);
                $row->addText($analyzerRow->sqlSelectType);
                $row->addText($analyzerRow->sqlKey);
                $row->addText((new Number($analyzerRow->sqlRows))->formatNumber());
                $row->addText($analyzerRow->sqlExtra);

            }
        }

        return parent::getContent();

    }

}