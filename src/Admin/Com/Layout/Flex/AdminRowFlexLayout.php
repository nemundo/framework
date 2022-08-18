<?php


namespace Nemundo\Admin\Com\Layout\Flex;


use Nemundo\Html\Block\Div;


// AdminRowFlexboxLayout
class AdminRowFlexLayout extends Div
{

    public function getContent()
    {
        $this->addCssClass('admin-row-flex-layout');
        return parent::getContent();
    }

}