<?php

namespace Nemundo\Dev\App\Site;


use Nemundo\Admin\Config\Site\ConfigSite;
use Nemundo\Admin\Log\Site\LogFileSite;
use Nemundo\Admin\MySql\Site\MySqlSite;
use Nemundo\Admin\Usergroup\Site\UsergroupSite;
use Nemundo\App\Mail\Site\MailQueueSite;
use Nemundo\App\Migration\Site\MigrationSite;
use Nemundo\App\Scheduler\Site\SchedulerSite;
use Nemundo\App\Script\Site\ScriptSite;
use Nemundo\App\System\Site\SystemSite;
use Nemundo\App\SystemLog\Site\SystemLogSite;
use Nemundo\App\UserAdmin\Site\UserAdminSite;
use Nemundo\App\WebLog\Site\WebLogSite;
use Nemundo\Project\Usergroup\SystemAdministratorUsergroup;
use Nemundo\Web\Site\AbstractSite;

class SystemAdminSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'System Admin';
        $this->url = 'system-admin';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new SystemAdministratorUsergroup());

        new SchedulerSite($this);
        new MailQueueSite($this);
        new ScriptSite($this);
        new MySqlSite($this);
        new UserAdminSite($this);
        new UsergroupSite($this);
        new SystemLogSite($this);
        new WebLogSite($this);
        new SystemSite($this);
        new LogFileSite($this);
        new ConfigSite($this);
        new MigrationSite($this);

    }


    public function loadContent()
    {

    }


}