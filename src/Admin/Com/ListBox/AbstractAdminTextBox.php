<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Com\FormBuilder\Item\AbstractTextBox;
use Nemundo\Html\Form\Formatting\Label;

class AbstractAdminTextBox extends AbstractTextBox
{

    use AdminErrorMessageTrait;

    /**
     * @var Label
     */
    private $textLabel;

    protected function loadContainer()
    {
        parent::loadContainer();

        $this->tagName = 'div';
        $this->addCssClass('admin-textbox');

        $this->textLabel = new Label();
        //$label->for = $this->name;
        //$label->content = $this->getLabelErrorMessage();

        $this->addContainer($this->textLabel);
        $this->addContainer($this->textInput);

    }

    public function getContent()
    {

        $this->prepareHtml();

        $this->textLabel->for = $this->name;
        $this->textLabel->content = $this->getLabelErrorMessage();


        /*$this->tagName = 'div';
        $this->addCssClass('admin-textbox');

        $label = new Label();
        $label->for = $this->name;
        $label->content = $this->getLabelErrorMessage();

        $this->addContainer($label);
        $this->addContainer($this->textInput);*/

        return parent::getContent();

    }

}