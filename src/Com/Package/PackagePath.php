<?php


namespace Nemundo\Com\Package;


use Nemundo\Core\Path\Path;
use Nemundo\FrameworkProject;

class PackagePath extends Path
{

    public function __construct(AbstractPackage $package)
    {
        parent::__construct();

        if ($package->project == null) {
            $package->project = new FrameworkProject();
        }

        $this
            ->addPath($package->project->path)
            ->addPath('..')
            ->addPath('package')
            ->addPath($package->packageName);

    }

}