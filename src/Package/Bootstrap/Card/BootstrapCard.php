<?php

namespace Nemundo\Package\Bootstrap\Card;


use Nemundo\Html\Block\Div;


class BootstrapCard extends Div
{


    public function getContent()
    {

        $this->addCssClass('card');
        $this->addCssClass('card-block');

        return parent::getContent();
    }

}