<?php

namespace Nemundo\Admin\Com\ListBox;


use Nemundo\Com\FormBuilder\Item\AbstractListBox;
use Nemundo\Html\Form\Formatting\Label;

class AdminListBox extends AbstractListBox
{
    use AdminErrorMessageTrait;

    public function addInputDataAttribute($attribute, $value)
    {
        $this->select->addDataAttribute($attribute, $value);
    }


    public function getContent()
    {

        $this->prepareHtml();

        $this->tagName = 'div';
        $this->addCssClass('admin-textbox');

        $label = new Label();
        $label->for = $this->name;
        $label->content = $this->getLabelErrorMessage();

        $this->select->addCssClass('admin-select');

        $this->addContainer($label);
        $this->addContainer($this->select);

        return parent::getContent();

    }
}