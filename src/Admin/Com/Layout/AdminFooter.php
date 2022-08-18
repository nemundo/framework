<?php

namespace Nemundo\Admin\Com\Layout;

use Nemundo\Html\Layout\Footer;

class AdminFooter extends Footer
{

    public function getContent()
    {

        $this->addCssClass('admin-footer');
        return parent::getContent();

    }

}