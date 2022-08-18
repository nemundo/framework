<?php

namespace Nemundo\Admin\Com\Icon;

use Nemundo\Package\FontAwesome\FontAwesomeIcon;

class AdminIcon extends FontAwesomeIcon
{

    public function getContent()
    {

        $this->addCssClass('admin-icon');
        return parent::getContent();

    }

}