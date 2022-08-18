<?php


namespace Nemundo\Project\Deployment\Copy;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\FileCopy;
use Nemundo\Core\Path\Path;
use Nemundo\Project\AbstractProject;

class SourceFileCopy extends AbstractBase
{

    public $deploymentPath;

    /**
     * @var AbstractProject
     */
    public $project;


    public function copyFile($filename)
    {

        $destinationPath = (new Path($this->deploymentPath))->addPath('source');
        $destinationPath->createPath();

        $sourcePath = (new Path(($this->project)->path))
            ->addParentPath()
            ->addPath('source');

        $copy = new FileCopy();
        $copy->overwriteExistingFile = true;
        $copy->sourceFilename = $sourcePath
            ->addPath($filename)
            ->getFullFilename();
        $copy->destinationFilename = $destinationPath->addPath($filename)->getFullFilename();
        $copy->copyFile();

        return $this;

    }

}