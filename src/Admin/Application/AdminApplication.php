<?php

namespace Nemundo\Admin\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Application\Type\Install\Install;
use Nemundo\Package\FontAwesome\Package\FontAwesomePackage;
use Nemundo\Package\Framework\FrameworkCssPackage;
use Nemundo\Package\Framework\FrameworkJsPackage;

class AdminApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Admin';
        $this->applicationId = 'c2d892b7-eb8d-49f5-ac7c-a3e86b5023f7';
        $this->installClass = Install::class;

        $this->addPackage(new FrameworkJsPackage())
            ->addPackage(new FrameworkCssPackage())
            ->addPackage(new FontAwesomePackage());

    }
}