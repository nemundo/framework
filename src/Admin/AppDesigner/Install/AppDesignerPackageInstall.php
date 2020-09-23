<?php

namespace Nemundo\Admin\AppDesigner\Install;


use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\File\FileCopy;
use Nemundo\Core\File\Path;
use Nemundo\Com\Package\PackageSetup;
use Nemundo\FrameworkProject;
use Nemundo\Package\Bootstrap\Package\BootstrapPackage;
use Nemundo\Package\FontAwesome\FontAwesomePackage;
use Nemundo\Package\Jquery\Package\JqueryPackage;
use Nemundo\Package\JqueryUi\JqueryUiPackage;

use Nemundo\Package\Popper\PopperPackage;

use Nemundo\Web\WebConfig;


// AdminInstall
class AppDesignerPackageInstall extends AbstractScript
{

    /**
     * @var string
     */
    public $projectPath;

    public function run()
    {

        //WebConfig::$webPath = ProjectConfig::$projectPath . 'admin';
        WebConfig::$webPath = $this->projectPath . 'admin';

        $this->copyAssetFile('.htaccess', '.htaccess');
        $this->copyAssetFile('config.php', 'config.php');
        $this->copyAssetFile('index.php', 'index.php');

        $setup = new PackageSetup();
        $setup->addPackage(new BootstrapPackage());
        $setup->addPackage(new FontAwesomePackage());
        $setup->addPackage(new PopperPackage());
        $setup->addPackage(new JqueryPackage());
        $setup->addPackage(new JqueryUiPackage());

    }


    private function copyAssetFile($filenameFrom, $filenameTo)
    {

        $fileCopy = new FileCopy();
        $fileCopy->sourceFilename = (new Path())
            ->addPath((new FrameworkProject())->path)
            ->addPath('..')
            ->addPath('package')
            ->addPath('app_designer')
            ->addPath($filenameFrom)
            ->getFilename();

        $fileCopy->destinationFilename = (new Path())
            ->addPath($this->projectPath)
            ->addPath('admin')
            ->addPath($filenameTo)
            ->getFilename();

        $fileCopy->copyFile();

    }

}