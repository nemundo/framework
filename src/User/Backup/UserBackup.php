<?php

namespace Nemundo\User\Backup;

use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\App\Backup\Type\AbstractBackup;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Document\JsonDocument;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\User\Builder\UserBuilder;
use Nemundo\User\Password\PasswordChange;
use Nemundo\User\Reader\User\UserDataReader;

class UserBackup extends AbstractBackup
{

    protected function loadBackup()
    {

        $this->filename = 'user_user.json';

    }


    protected function loadExport()
    {

        $reader = new UserDataReader();
        foreach ($reader->getData() as $userRow) {

            $row = [];
            $row['id'] = $userRow->id;
            $row['active'] = $userRow->active;
            $row['login'] = $userRow->login;
            $row['display_name'] = $userRow->displayName;
            $row['password_hash'] = $userRow->password;

            $usergroupList = [];
            foreach ($userRow->getUsergroupList() as $usergroupRow) {

                $usergroup = [];
                $usergroup['id'] = $usergroupRow->id;
                $usergroup['usergroup'] = $usergroupRow->usergroup;

                $usergroupList[] = $usergroup;

            }

            $row['usergroup'] = $usergroupList;

            $this->addExportRow($row);

        }

    }


    protected function onImport($jsonRow)
    {

            $builder = new UserBuilder();
            $builder->login = $jsonRow['login'];
            $builder->email = $jsonRow['login'];
            $userId = $builder->createUser();

            foreach ($jsonRow['usergroup'] as $usergroup) {
                $builder->addUsergroupId($usergroup['id']);
            }

            (new PasswordChange($userId))->changePasswordByHash($jsonRow['password_hash']);

    }


}