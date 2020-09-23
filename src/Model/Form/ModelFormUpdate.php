<?php

namespace Nemundo\Model\Form;


use Nemundo\Model\Data\ModelUpdate;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Reader\ModelDataReader;


// Abstract
class ModelFormUpdate extends AbstractModelForm
{

    /**
     * @var string
     */
    public $updateId;

    public function getContent()
    {

        if (!$this->checkProperty('updateId')) {
            return;
        }

        $reader = new ModelDataReader();
        $reader->connection = $this->connection;
        $reader->model = $this->model;
        $reader->addFieldByModel($this->model);
        $reader->checkExternal($this->model);
        $row = $reader->getRowById($this->updateId);

        $count = 0;


        foreach ($this->model->getTypeList() as $field) {

            if ($field->visible->form) {

                /** @var AbstractModelFormItem $formItem */
                $formItem = new $field->formTypeClassName($this);
                $formItem->connection = $this->connection;
                $formItem->row = $row;
                $formItem->loadType($field);

                if ($count == 0) {
                    $formItem->focus = true;
                }
                $count++;

            }

        }

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $update = new ModelUpdate();
        $update->model = $this->model;
        $update->connection = $this->connection;


        foreach ($this->model->getTypeList() as $type) {

            if ($type->visible->form) {

                /** @var AbstractModelFormItem $item */
                $item = new $type->formTypeClassName($this);
                $item->visible = false;
                $item->loadType($type);
                $item->typeValueList = $update->typeValueList;
                $item->saveValue();

            }
        }

        $update->updateById($this->updateId);
        //$this->redirectId = $this->updateId;

        //$this->checkIdParameter($this->updateId);

        return $this->updateId;

    }

}