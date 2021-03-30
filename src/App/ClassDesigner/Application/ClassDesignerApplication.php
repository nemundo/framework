<?php

namespace Nemundo\App\ClassDesigner\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Application\Type\Install\Install;
use Nemundo\App\Application\Type\Install\Uninstall;

class ClassDesignerApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'ClassDesigner';
        $this->applicationId = '159e0fe2-6f02-4091-a93c-e50f2a519f8d';
        $this->installClass = Install::class;
        $this->uninstallClass = Uninstall::class;
    }
}