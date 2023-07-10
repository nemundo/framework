<?php

namespace Nemundo\App\Backup\Reader;

use Nemundo\App\Backup\Data\Backup\BackupReader;

class BackupDataReader extends BackupReader
{

    public $applicationId;


    public function getData()
    {

        if ($this->applicationId!==null) {
            $this->filter->andEqual($this->model->applicationId,$this->applicationId);
        }

        return parent::getData();

    }


}