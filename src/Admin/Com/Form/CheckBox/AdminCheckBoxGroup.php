<?php

namespace Nemundo\Admin\Com\Form\CheckBox;

use Nemundo\Admin\Com\ListBox\AdminCheckBox;
use Nemundo\Com\FormBuilder\Item\AbstractRadioGroup;
use Nemundo\Html\Form\Formatting\Fieldset;
use Nemundo\Html\Form\Formatting\Legend;

class AdminCheckBoxGroup extends AbstractRadioGroup
{

    public function getContent()
    {

        $this->prepareHtml();

        $fieldset = new Fieldset($this);
        $fieldset->addCssClass('admin-checkbox-group');

        $legend = new Legend($fieldset);
        $legend->content = $this->label;

        foreach ($this->itemList as $listItem) {

            $this->radioButtonList[$listItem->value] = new AdminCheckBox($fieldset);
            $this->radioButtonList[$listItem->value]->name = $this->prefix . $listItem->value;
            $this->radioButtonList[$listItem->value]->value = $listItem->checked;
            $this->radioButtonList[$listItem->value]->label = $listItem->label;

        }

        return parent::getContent();

    }

}