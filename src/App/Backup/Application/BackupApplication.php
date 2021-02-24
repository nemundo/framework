<?php

namespace Nemundo\App\Backup\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Backup\Site\BackupSite;
use Nemundo\App\Mail\Data\MailCollection;
use Nemundo\App\Mail\Install\MailInstall;
use Nemundo\App\Mail\Install\MailUninstall;
use Nemundo\App\Mail\Site\MailSite;

class BackupApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->application = 'Backup';
        $this->applicationId = '561a06cd-48d9-4cf0-8267-494554992f4e';
        $this->adminSiteClass = BackupSite::class;

    }

}