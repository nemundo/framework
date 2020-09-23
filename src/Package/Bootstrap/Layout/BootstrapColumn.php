<?php

namespace Nemundo\Package\Bootstrap\Layout;


use Nemundo\Html\Container\AbstractHtmlContainer;

class BootstrapColumn extends AbstractHtmlContainer
{

    /**
     * @var int
     */
    public $columnWidth = 12;


    public function getContent()
    {

        $this->tagName = 'div';
        $this->addCssClass('col-xl-' . $this->columnWidth);

        return parent::getContent();

    }

}
