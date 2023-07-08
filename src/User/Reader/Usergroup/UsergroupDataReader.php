<?php

namespace Nemundo\User\Reader\Usergroup;

use Nemundo\User\Data\Usergroup\UsergroupReader;

class UsergroupDataReader extends UsergroupReader
{

    public function getData()
    {

        $this->addOrder($this->model->usergroup);

        return parent::getData();
    }

}