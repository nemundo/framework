<?php

namespace Nemundo\Admin\MySql\Com;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Time\Stopwatch;
use Nemundo\Db\Reader\SqlReader;
use Nemundo\Package\Bootstrap\Form\BootstrapSearchForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\Table\BootstrapTable;
use Nemundo\Web\Parameter\UrlParameter;


class MySqlQuery extends AbstractHtmlContainer
{


    public function getContent()
    {

        $form = new BootstrapSearchForm($this);

        $sql = new BootstrapLargeTextBox($form);
        $sql->name = 'sql';
        $sql->label = 'SQL';
        $sql->autofocus = true;
        $sql->value = $sql->getValue();

        $sqlRequest = new UrlParameter();
        $sqlRequest->parameterName= 'sql';

        if ($sqlRequest->existsParameter()) {

            $stopwatch = new Stopwatch();

            $p = new Paragraph($this);


            $reader = new SqlReader();
            $reader->sqlStatement->sql = $sqlRequest->getValue();

            $table = new BootstrapTable($this);
            $tableHeader = new TableHeader($table);

            $count = 0;
            foreach ($reader->getData() as $row) {

                // Header
                if ($count == 0) {
                    foreach ($row->getHeader() as $header) {
                        $tableHeader->addText($header);
                    }
                }

                // Data
                $tableRow = new TableRow($table);

                foreach ($row->getHeader() as $header) {
                    $tableRow->addText($row->getValue($header));
                }

                $count++;

            }

            $p->content = $stopwatch->stop() . ' sec';


        }


        return parent::getContent();
    }


}