<?php

namespace Nemundo\Admin\Template;


class UserAdminTemplate extends AdminTemplate
{

    protected function loadContainer()
    {

        parent::loadContainer();
        AdminTemplate::$navbar->userMode = true;

    }

}