<?php

namespace Nemundo\Package\Bootstrap\FormElement;

use Nemundo\Com\FormBuilder\Item\AbstractTextBox;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;

class BootstrapTextBox extends AbstractTextBox
{

    use BootstrapFormStyle;

    /**
     * @var Label
     */
    protected $labelLabel;


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->labelLabel = new Label();
    }


    public function getContent()
    {

        $this->prepareHtml();

        $this->loadStyle();

        //$this->tagName = 'div';

        /*
        $this->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);
        $this->addCssClass('col');*/


        //$this->addCssClass('form-group');

        $this->textInput->addCssClass('form-control');


        /*
        <label for="formGroupExampleInput" class="form-label">Example label</label>
        */

        $this->labelLabel->addCssClass('form-label');
        $this->labelLabel->content = $this->getLabelText();

        if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('form-control-label');
            $bold->content = $this->errorMessage;

            $this->labelLabel->content .= ' ' . $bold->getBodyContent();
            //$this->addCssClass('has-danger');
            //$this->textInput->addCssClass('form-control-danger');

        }

        $this->addContainer($this->labelLabel);
        $this->addContainer($this->textInput);

        return parent::getContent();

    }

}