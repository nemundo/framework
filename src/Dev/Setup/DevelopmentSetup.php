<?php

namespace Nemundo\Dev\Setup;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\CssDesigner\Application\CssDesignerApplication;
use Nemundo\App\ModelDesigner\Application\ModelDesignerApplication;
use Nemundo\Dev\Staging\StagingConfig;
use Nemundo\Dev\Staging\StagingEnvironment;
use Nemundo\Project\Setup\AbstractSetup;

class DevelopmentSetup extends AbstractInstall
{


    public function install()
    {

        if (StagingConfig::$stagingEnviroment == StagingEnvironment::DEVELOPMENT) {
            (new ModelDesignerApplication())->installApp();
            (new CssDesignerApplication())->installApp();
        }


        // TODO: Implement install() method.
    }


}