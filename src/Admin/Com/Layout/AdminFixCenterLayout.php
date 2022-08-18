<?php


namespace Nemundo\Admin\Com\Layout;


use Nemundo\Html\Block\Div;

class AdminFixCenterLayout extends Div
{

    public function getContent()
    {
        $this->addCssClass('admin-fix-center-layout');
        return parent::getContent();
    }

}