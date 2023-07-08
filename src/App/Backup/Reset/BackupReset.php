<?php

namespace Nemundo\App\Backup\Reset;

use Nemundo\App\Backup\Data\Backup\BackupDelete;
use Nemundo\App\Backup\Data\Backup\BackupUpdate;
use Nemundo\Project\Reset\AbstractReset;

class BackupReset extends AbstractReset
{

    public function reset()
    {

        $update = new BackupUpdate();
        $update->setupStatus = false;
        $update->update();

    }

    public function remove()
    {

        $delete = new BackupDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

    }

}