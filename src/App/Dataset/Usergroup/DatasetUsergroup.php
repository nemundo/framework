<?php

namespace Nemundo\App\Dataset\Usergroup;

use Nemundo\User\Usergroup\AbstractUsergroup;

class DatasetUsergroup extends AbstractUsergroup
{
    protected function loadUsergroup()
    {
        $this->usergroup = 'Dataset';
        $this->usergroupId = '05d43b62-9a18-40c7-a79e-7e1e8003babc';
    }
}