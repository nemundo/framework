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

        $this->filename = 'user.json';

    }


    protected function loadExport()
    {

        /*$json = new JsonDocument();
        $json->filename = $this->filename;
        $json->overwriteExistingFile = true;*/

        $reader = new UserDataReader();
        foreach ($reader->getData() as $userRow) {

            $row = [];
            $row['id'] = $userRow->id;
            $row['active'] = $userRow->active;
            $row['login'] = $userRow->login;
            $row['display_name'] = $userRow->displayName;
            $row['password'] = $userRow->password;

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

        //$json->writeFile((new BackupPath())->getPath());

    }


    public function import()
    {

        $reader = new JsonReader();
        $reader->fromFilename($this->getFullFilename());
        foreach ($reader->getData() as $jsonRow) {

            //(new \Nemundo\Core\Debug\Debug())->write($jsonRow['login']);

            $builder = new UserBuilder();
            $builder->login = $jsonRow['login'];
            $builder->email = $jsonRow['login'];
            $userId = $builder->createUser();

            foreach ($jsonRow['usergroup'] as $usergroup) {

                (new Debug())->write($usergroup['id']);
                $builder->addUsergroupId($usergroup['id']);

            }

            (new PasswordChange($userId))->changePasswordByHash($jsonRow['password']);


        }


    }


}