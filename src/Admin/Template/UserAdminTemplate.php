<?php

namespace Nemundo\Admin\Template;


use Nemundo\Html\Paragraph\Paragraph;

class UserAdminTemplate extends AdminTemplate
{

    protected function loadContainer()
    {

        parent::loadContainer();

        /*$p=new Paragraph($this);
        $p->content = 'user: ';*/

        $this->navbar->userMode = true;

    }

}