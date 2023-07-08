<?php

namespace Nemundo\App\Backup\Setup;

use Nemundo\App\Application\Setup\AbstractSetup;
use Nemundo\App\Backup\Data\Backup\Backup;
use Nemundo\App\Backup\Type\AbstractBackup;

class BackupSetup extends AbstractSetup
{


    public function addBackup(AbstractBackup $backup) {

        $data = new Backup();
        $data->updateOnDuplicate=true;
        $data->applicationId=$this->application->applicationId;
        $data->phpClass = $backup->getClassName();
        $data->filename = $backup->filename;
        $data->setupStatus=true;
        $data->save();

        return $this;



    }


}