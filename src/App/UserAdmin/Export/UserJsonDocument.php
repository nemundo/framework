<?php

namespace Nemundo\App\UserAdmin\Export;

use Nemundo\Core\Json\Document\AbstractJsonDocument;
use Nemundo\User\Reader\User\UserDataReader;

class UserJsonDocument extends AbstractJsonDocument
{

    protected function loadDocument()
    {

        $this->filename = 'user.json';

        $reader = new UserDataReader();

        foreach ($reader->getData() as $userRow) {


            $row =[];
            $row['active'] = $userRow->active;
            $row['login'] =$userRow->login;
            $row['display_name'] = $userRow->displayName;
            $row['password'] = $userRow->password;

            /*$userUsergroupReader = new UserUsergroupReader();
            $userUsergroupReader->model->loadUser();
            $userUsergroupReader->model->loadUsergroup();
            $userUsergroupReader->filter->andEqual($userUsergroupReader->model->userId, $userRow->id);

            $usergroup = new TextDirectory();*/

            $usergroupList=[];

            foreach ($userRow->getUsergroupList() as $usergroupRow) {
                //$usergroup->addValue($userUsergroupRow->usergroup->usergroup);

                $usergroup=[];
                $usergroup['id'] = $usergroupRow->id;
                $usergroup['usergroup'] = $usergroupRow->usergroup;

                $usergroupList[]=$usergroup;


            }


            $row['usergroup']=$usergroupList;

            /*$row->addText($usergroup->getTextWithSeperator());

            $userParameter = new UserParameter($userRow->id);*/

            $this->addRow($row);


        }






    }

}