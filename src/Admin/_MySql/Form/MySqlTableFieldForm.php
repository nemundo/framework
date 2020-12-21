<?php

namespace Nemundo\Admin\MySql\Form;


use Nemundo\Db\Provider\MySql\Field\MySqlField;
use Nemundo\Db\Provider\MySql\Field\MySqlFieldTypeReader;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class MySqlTableFieldForm extends BootstrapForm
{

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var BootstrapTextBox
     */
    private $fieldName;

    /**
     * @var BootstrapListBox
     */
    private $fieldType;


    public function getContent()
    {

        $this->fieldName = new BootstrapTextBox($this);
        $this->fieldName->label = 'Field Name';
        $this->fieldName->validation = true;
        $this->fieldName->autofocus = true;


        $this->fieldType = new BootstrapListBox($this);
        $this->fieldType->label = 'Field Type';

        $fieldTypeReader = new MySqlFieldTypeReader();
        foreach ($fieldTypeReader->getData() as $fieldType) {
            $this->fieldType->addItem($fieldType);
        }

        $this->submitButton->label = 'Create Table Field';

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $field = new MySqlField();
        $field->tableName = $this->tableName;
        $field->fieldName = $this->fieldName->getValue();
        $field->fieldType = $this->fieldType->getValue();
        $field->createField();

    }


}