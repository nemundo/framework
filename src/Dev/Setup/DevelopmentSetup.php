<?php

namespace Nemundo\Dev\Setup;

use Nemundo\App\Apache\Application\ApacheApplication;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\CssDesigner\Application\CssDesignerApplication;
use Nemundo\App\ModelDesigner\Application\ModelDesignerApplication;
use Nemundo\Dev\Staging\StagingConfig;
use Nemundo\Dev\Staging\StagingEnvironment;

class DevelopmentSetup extends AbstractInstall
{

    public function install()
    {

        if (StagingConfig::$stagingEnviroment == StagingEnvironment::DEVELOPMENT) {
            (new ModelDesignerApplication())->installApp();
            (new CssDesignerApplication())->installApp();
            //(new ApacheApplication())->installApp();
        }

    }

}