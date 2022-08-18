<?php


namespace Nemundo\Admin\Com\Layout;


use Nemundo\Html\Block\Div;


// AdminRowFlexboxLayout
// AdminFlexLayout
class AdminFlexboxLayout extends Div
{

    public function getContent()
    {
        $this->addCssClass('admin-default-layout');
        return parent::getContent();
    }

}