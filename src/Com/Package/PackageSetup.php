<?php

namespace Nemundo\Com\Package;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\File\DirectoryCopier;
use Nemundo\Core\Path\Path;
use Nemundo\FrameworkProject;
use Nemundo\Web\WebConfig;

class PackageSetup extends AbstractBaseClass
{

    public function addPackage(AbstractPackage $package)
    {

        if ($package->project == null) {
            $package->project = new FrameworkProject();
        }

        $sourcePath = (new Path())
            ->addPath($package->project->path)
            ->addPath('..')
            ->addPath('package')
            ->addPath($package->packageName)
            ->getPath();

        $destinationPath = (new Path())
            ->addPath(WebConfig::$webPath)
            ->addPath('asset')
            ->addPath($package->packageName)
            ->getPath();

        $copy = new DirectoryCopier();
        $copy->overwriteExistingFile = true;
        $copy->sourcePath = $sourcePath;
        $copy->destinationPath = $destinationPath;
        $copy->copyDirectory();

        return $this;

    }

}