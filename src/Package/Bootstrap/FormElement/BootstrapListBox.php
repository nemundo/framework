<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Com\FormBuilder\Item\AbstractListBox;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;

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

/*
        <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>*/

        $this->tagName = 'div';
        $this->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);
        $this->addCssClass('col');


        //$this->addCssClass('pr-3');
        //$this->addCssClass('form-group');
        //$this->select->addCssClass('form-control');

//$this->addCssClass('mb-3');

        $this->select->addCssClass('form-select');


        $label = new Label();
        $label->id = 'label_'.$this->name;
        $label->addCssClass('form-label');
        $label->content = $this->getLabelText();

        if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('form-control-label');
            $bold->content = $this->errorMessage;

            $label->content .= ' ' . $bold->getBodyContent();
            $this->addCssClass('has-danger');
            $this->select->addCssClass('form-control-danger');

        }

        $this->addContainer($label);
        $this->addContainer($this->select);

        return parent::getContent();

    }

}