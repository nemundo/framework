<?php

namespace Nemundo\User\Com\Table;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;

class UsergroupTable extends AdminTable
{

    public $usergroupId;

    public function getContent()
    {

        $userUsergroupReader = new UserUsergroupReader();
        $userUsergroupReader->model->loadUser();
        $userUsergroupReader->model->loadUsergroup();
        $userUsergroupReader->filter->andEqual($userUsergroupReader->model->userId, $userRow->id);

        $usergroup = new TextDirectory();
        foreach ($userUsergroupReader->getData() as $userUsergroupRow) {
            $usergroup->addValue($userUsergroupRow->usergroup->usergroup);
        }

        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}