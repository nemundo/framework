<?php

namespace Nemundo\Admin\MySql\Com;


use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class MySqlTableListBox extends BootstrapListBox
{

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->label = 'MySql Table';

    }


    public function getContent()
    {

        $reader = new MySqlTableReader();

        foreach ($reader->getData() as $table) {
            $this->addItem($table->tableName);
        }

        return parent::getContent();
    }


}