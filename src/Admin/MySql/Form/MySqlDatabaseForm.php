<?php

namespace Nemundo\Admin\MySql\Form;


use Nemundo\Db\Provider\MySql\Database\MySqlDatabase;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class MySqlDatabaseForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $database;

    public function getContent()
    {

        $this->database = new BootstrapTextBox($this);
        $this->database->label = 'Database';
        $this->database->autofocus = true;
        $this->database->validation = true;

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $mysql = new MySqlDatabase();
        $mysql->databaseName = $this->database->getValue();
        $mysql->createDatabase();

    }

}