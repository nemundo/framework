<?php

namespace Nemundo\Admin\MySql\Com;


use Nemundo\Db\Provider\MySql\Database\MySqlDatabaseReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class MySqlDatabaseListBox extends BootstrapListBox
{


    public function getContent()
    {

        $database = new MySqlDatabaseReader();
        foreach ($database->getData() as $database) {

            $this->addItem($database->databaseName);
        }


        return parent::getContent();
    }

}