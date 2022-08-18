<?php


namespace Nemundo\Admin\Com\Layout\Flex;


use Nemundo\Html\Block\Div;


// AdminRowFlexboxLayout
class AdminColumnFlexLayout extends Div
{

    public function getContent()
    {
        $this->addCssClass('admin-column-flex-layout');
        return parent::getContent();
    }

}