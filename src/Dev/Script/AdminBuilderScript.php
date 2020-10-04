<?php

namespace Nemundo\Dev\Script;

use Nemundo\Admin\Install\AdminPackageInstall;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Com\Package\PackageSetup;
use Nemundo\Package\Bootstrap\Package\BootstrapPackage;
use Nemundo\Package\BootstrapMultiselect\Package\BootstrapMultiselectPackage;
use Nemundo\Package\CropperJs\CropperJsPackage;
use Nemundo\Package\Dropzone\DropzonePackage;
use Nemundo\Package\Echarts\Package\EchartsPackage;
use Nemundo\Package\Fancybox\FancyboxPackage;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\JqueryUi\JqueryUiPackage;
use Nemundo\Package\Popper\PopperPackage;
use Nemundo\Project\Path\ProjectPath;

class AdminBuilderScript extends AbstractConsoleScript
{

    protected function loadScript()
    {

        $this->scriptName = 'admin-setup';

    }

    public function run()
    {

        $projectPath =  (new ProjectPath())
            ->addPath('admin')
            ->getPath();

        (new AdminPackageInstall($projectPath))->install();

        /*
        $setup = new PackageSetup();
        $setup->destinationPath = (new ProjectPath())
            ->addPath('admin')
            ->getPath();
        $setup->addPackage(new JqueryPackage());
        $setup->addPackage(new JqueryUiPackage());
        $setup->addPackage(new BootstrapPackage());
        $setup->addPackage(new PopperPackage());
        $setup->addPackage(new FontAwesomePackage());
        $setup->addPackage(new CropperJsPackage());
        $setup->addPackage(new EchartsPackage());
        $setup->addPackage(new FancyboxPackage());
        $setup->addPackage(new BootstrapMultiselectPackage());
        $setup->addPackage(new DropzonePackage());*/

    }

}