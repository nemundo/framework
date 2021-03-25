<?php

namespace Nemundo\App\Git\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Git\Site\GitSite;

class GitApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Git';
        $this->applicationId = 'c70dbaa0-8d43-4372-8388-2b335cc471da';
        $this->adminSiteClass=GitSite::class;
    }
}