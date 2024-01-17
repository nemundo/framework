<?php

namespace Nemundo\App\UserAction\Service;

use Nemundo\App\WebService\Service\AbstractWebService;
use Nemundo\User\Data\Usergroup\UsergroupReader;


class UsergroupListWebService extends AbstractWebService
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