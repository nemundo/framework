<?php

namespace Nemundo\App\Backup\Com\Tab;

use Nemundo\Admin\Com\Tab\AdminTab;
use Nemundo\App\Backup\Site\BackupSite;

class BackupTab extends AdminTab
{

    public function getContent()
    {

        $this->site = BackupSite::$site;
        return parent::getContent();

    }

}