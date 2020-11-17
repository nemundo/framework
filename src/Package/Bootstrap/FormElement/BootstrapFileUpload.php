<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Com\FormBuilder\Item\AbstractFileUpload;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Html\Formatting\Bold;

class BootstrapFileUpload extends AbstractFileUpload
{

    public function getContent()
    {

        $this->prepareHtml();

        $this->tagName = 'div';
        $this->addCssClass('form-group');
        $this->addCssClass('col');
        $this->addCssClass('custom-file');

        $label = new Label();
        $label->content = $this->getLabelText();

        if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('form-control-label');
            $bold->content = $this->errorMessage;

            $label->content .= ' ' . $bold->getBodyContent();
            $this->addCssClass('has-danger');
            $this->fileInput->addCssClass('form-control-danger');

        }

        $this->addContainer($label);
        $this->addContainer($this->fileInput);

        return parent::getContent();

    }

}