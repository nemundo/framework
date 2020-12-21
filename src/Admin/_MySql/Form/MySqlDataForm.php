<?php

namespace Nemundo\App\MySqlAdmin\Form;


use Nemundo\Db\Data\Data;
use Nemundo\Db\Provider\MySql\Field\MySqlFieldType;
use Nemundo\Db\Provider\MySql\Field\MySqlTableFieldReader;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class MySqlDataForm extends BootstrapForm
{

    /**
     * @var string
     */
    public $tableName;


    public function getContent()
    {

        $fieldReader = new MySqlTableFieldReader();
        $fieldReader->tableName = $this->tableName;

        foreach ($fieldReader->getData() as $field) {

            if ($field->fieldName !== 'id') {

                switch ($field->fieldType) {


                    case MySqlFieldType::LONGTEXT:
                        $input = new BootstrapLargeTextBox($this);
                        $input->name = $field->fieldName;
                        $input->label = $field->fieldName;


                        break;

                    default:
                        $textInput = new BootstrapTextBox($this);
                        $textInput->name = $field->fieldName;
                        $textInput->label = $field->fieldName;

                }


            }


        }


        return parent::getContent();
    }


    protected function onSubmit()
    {


        $data = new Data();
        $data->tableName = $this->tableName;

        $fieldReader = new MySqlTableFieldReader();
        $fieldReader->tableName = $this->tableName;

        foreach ($fieldReader->getData() as $field) {

            if ($field->fieldName !== 'id') {

                //$data->setValue($field->fieldName, HttpRequest::post($field->fieldName));

            }


        }

        $data->save();


    }


}