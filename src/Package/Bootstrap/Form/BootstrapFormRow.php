<?php

namespace Nemundo\Package\Bootstrap\Form;


use Nemundo\Html\Container\AbstractHtmlContainer;

class BootstrapFormRow extends AbstractHtmlContainer
{

    public function getContent()
    {
        $this->tagName = 'div';
        $this->addCssClass('form-row');

        return parent::getContent();
    }

}