<?php

namespace Nemundo\App\Backup\Reader;

use Nemundo\App\Backup\Data\Backup\BackupRow;
use Nemundo\App\Backup\Type\AbstractBackup;


//Nemundo\App\Backup\Reader\BackupDataRow


class BackupDataRow extends BackupRow
{

    public function getBackup() {

        $className = $this->phpClass;

        /** @var AbstractBackup $backup */
        $backup = new $className;

        return $backup;

    }


}