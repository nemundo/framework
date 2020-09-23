<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Com\FormBuilder\Item\AbstractCheckBox;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Form\Formatting\Label;

class BootstrapCheckBox extends AbstractCheckBox
{

    public function getContent()
    {

        $this->prepareHtml();

        $this->tagName = 'div';
        $this->addCssClass('pr-3');

        $this->addCssClass('form-check');
        $this->checkbox->addCssClass('form-check-input');

        $label = new Label($this);
        $label->content = $this->checkbox->getContent() . ' ' . $this->getLabelText();

        $label->addCssClass('form-check-label');

        if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('form-control-label');
            $bold->content = $this->errorMessage;

            $label->content .= ' ' . $bold->getContent();
            $this->addCssClass('has-danger');
            $this->checkbox->addCssClass('form-control-danger');

        }

        return parent::getContent();

    }

}