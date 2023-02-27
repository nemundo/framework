<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Com\FormBuilder\Item\AbstractTextBox;
use Nemundo\Html\Form\Formatting\Label;

class AbstractAdminTextBox extends AbstractTextBox
{

    use AdminErrorMessageTrait;

    public function getContent()
    {

        $this->prepareHtml();

        $this->tagName = 'div';
        $this->addCssClass('admin-textbox');

        $label = new Label();
        $label->content = $this->getLabelErrorMessage();

        $this->addContainer($label);
        $this->addContainer($this->textInput);

        return parent::getContent();

    }

}