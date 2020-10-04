<?php

namespace Nemundo\Admin\Template;


class UserAdminTemplate extends AdminTemplate
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->navbar->userMode = true;

    }

}