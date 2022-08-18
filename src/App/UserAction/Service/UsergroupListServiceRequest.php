<?php

namespace Nemundo\App\UserAction\Service;

use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\User\Data\Usergroup\UsergroupReader;


class UsergroupListServiceRequest extends AbstractServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'usergroup-list';
    }


    public function onRequest()
    {

        $usergroupReader = new UsergroupReader();
        $usergroupReader->addOrder($usergroupReader->model->usergroup);
        foreach ($usergroupReader->getData() as $usergroupRow) {

            $row = [];
            $row['id'] = $usergroupRow->id;
            $row['usergroup'] = $usergroupRow->usergroup;

            $this->addRow($row);

        }

    }

}