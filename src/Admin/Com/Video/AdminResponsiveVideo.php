<?php

namespace Nemundo\Admin\Com\Video;

use Nemundo\Admin\Style\AdminStyle;
use Nemundo\Html\Block\Div;


class AdminResponsiveVideo extends Div
{

    public function getContent()
    {

        $this->addCssClass(AdminStyle::$EMBEDDED_VIDEO);
        return parent::getContent();

    }

}