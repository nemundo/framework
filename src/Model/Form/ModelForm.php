<?php

namespace Nemundo\Model\Form;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Form\Item\AbstractModelFormItem;

// abstract
class ModelForm extends AbstractModelForm
{


    public function getContent()
    {

        if (!$this->checkObject('model', $this->model, AbstractModel::class)) {
            return;
        }
        $this->model->checkModel();


        $count = 0;


        foreach ($this->model->getTypeList() as $type) {

            if ($type->visible->form) {

                /** @var AbstractModelFormItem $formItem */
                $formItem = new $type->formTypeClassName($this);
                $formItem->connection = $this->connection;
                $formItem->loadType($type);
                $formItem->value = $type->defaultValue;

                if ($count == 0) {
                    $formItem->focus = true;
                }
                $count++;

            }

        }

        return parent::getContent();

    }

}