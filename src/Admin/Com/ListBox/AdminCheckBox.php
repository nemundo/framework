<?php

namespace Nemundo\Admin\Com\ListBox;


use Nemundo\Com\FormBuilder\Item\AbstractCheckBox;
use Nemundo\Html\Form\Formatting\Label;

class AdminCheckBox extends AbstractCheckBox
{

    public function getContent()
    {

        $this->prepareHtml();
        $this->tagName = 'div';

        $this->addCssClass('admin-checkbox-container');

        $this->addContainer($this->checkbox);

        $label = new Label($this);
        $label->addCssClass('admin-checkbox-label');
        $label->content = $this->getLabelText();
        $label->for = $this->checkbox->name;

        $this->checkbox->addCssClass('admin-checkbox');


        /*if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('form-control-label');
            $bold->content = $this->errorMessage;

            $label->content .= ' ' . $bold->getContent()->bodyContent;
            $this->addCssClass('has-danger');
            $this->checkbox->addCssClass('form-control-danger');

        }*/

        return parent::getContent();

    }

}