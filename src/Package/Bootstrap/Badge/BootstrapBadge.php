<?php

namespace Nemundo\Package\Bootstrap\Badge;


use Nemundo\Html\Container\AbstractHtmlContainer;

class BootstrapBadge extends AbstractHtmlContainer
{


    public function getContent()
    {

        $this->tagName = 'span';
        $this->addCssClass('badge badge-default');

        $this->addContent('New');

        return parent::getContent();
    }


//<span class="badge badge-default">New</span>

}