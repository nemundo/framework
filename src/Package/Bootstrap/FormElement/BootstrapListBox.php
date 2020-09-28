<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Com\FormBuilder\Item\AbstractListBox;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Form\Formatting\Label;

class BootstrapListBox extends AbstractListBox
{


    public function addInputCssClass($cssClass)
    {
        $this->select->addCssClass($cssClass);
    }


    public function addInputDataAttribute($attribute, $value)
    {
        $this->select->addDataAttribute($attribute, $value);
    }


    public function getContent()
    {

        $this->prepareHtml();

        if ($this->inputId !== null) {
            $this->select->id = $this->inputId;
        }

        $this->tagName = 'div';
        $this->addCssClass('pr-3');

        $this->addCssClass('form-group');
        $this->select->addCssClass('form-control');

        $label = new Label();
        $label->id = 'label_'.$this->name;
        $label->content = $this->getLabelText();

        if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('form-control-label');
            $bold->content = $this->errorMessage;

            $label->content .= ' ' . $bold->getContent();
            $this->addCssClass('has-danger');
            $this->select->addCssClass('form-control-danger');

        }

        $this->addContainer($label);
        $this->addContainer($this->select);

        return parent::getContent();

    }

}