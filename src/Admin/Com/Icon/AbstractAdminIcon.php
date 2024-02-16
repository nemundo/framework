<?php

namespace Nemundo\Admin\Com\Icon;

use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;

abstract class AbstractAdminIcon extends AbstractFontAwesomeIcon  // FontAwesomeIcon
{


    abstract protected function loadIcon();


    public function getContent()
    {

        $this->loadIcon();

        $this->addCssClass('admin-icon');
        return parent::getContent();

    }

}