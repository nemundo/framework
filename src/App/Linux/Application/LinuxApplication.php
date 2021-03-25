<?php

namespace Nemundo\App\Linux\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Linux\Site\LinuxSite;

class LinuxApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Linux';
        $this->applicationId = 'a48334bb-db41-4b54-965c-07a2844b0858';
        $this->adminSiteClass = LinuxSite::class;
    }
}