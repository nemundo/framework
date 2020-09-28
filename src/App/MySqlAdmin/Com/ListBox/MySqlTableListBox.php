<?php


namespace Nemundo\App\MySqlAdmin\Com\ListBox;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\MySqlAdmin\Parameter\TableParameter;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\Site;

class MySqlTableListBox extends BootstrapListBox
{

    protected function loadContainer()
    {

        $this->name=(new TableParameter())->parameterName;

        $reader = new MySqlTableReader();
        foreach ($reader->getData() as $table) {
            $this->addItem($table->tableName,$table->tableName);
        }


    }

}