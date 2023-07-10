<?php

namespace Nemundo\User\Backup;

use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\App\Backup\Type\AbstractBackup;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Document\JsonDocument;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\User\Builder\UserBuilder;
use Nemundo\User\Data\User\UserModel;
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
            $row[$reader->model->id->fieldName] = $userRow->id;
            $row[$reader->model->active->fieldName] = $userRow->active;
            $row[$reader->model->login->fieldName] = $userRow->login;
            $row[$reader->model->email->fieldName] = $userRow->email;
            $row[$reader->model->displayName->fieldName] = $userRow->displayName;
            $row[$reader->model->password->fieldName] = $userRow->password;

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

        $model = new UserModel();

            $builder = new UserBuilder();
            $builder->login = $jsonRow[$model->login->fieldName];
            $builder->email = $jsonRow[$model->email->fieldName];
            $builder->displayName = $jsonRow[$model->displayName->fieldName];
            $userId = $builder->createUser();

            foreach ($jsonRow['usergroup'] as $usergroup) {
                $builder->addUsergroupId($usergroup['id']);
            }

            (new PasswordChange($userId))->changePasswordByHash($jsonRow[$model->password->fieldName]);

    }


}