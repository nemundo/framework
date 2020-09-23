<?php

namespace Nemundo\Admin\MySql\Form;

use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Web\Url\Url;

class MySqlTableForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $tableName;


    public function getContent()
    {

        $this->tableName = new BootstrapTextBox($this);
        $this->tableName->label = 'Table Name';
        $this->tableName->autofocus = true;

        $this->submitButton->label = 'Create Table';

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $tableName = $this->tableName->getValue();

        $table = new MySqlTable();
        $table->tableName = $tableName;
        $table->createTable();

        //$url = new Url($this->redirectUrl);
        //$url->addParameter('table', $tableName);

        //$this->redirectUrl = $url->getUrl();


    }


}