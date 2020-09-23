<?php

namespace Nemundo\Dev\Test;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Console\ConsoleConfig;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Project\AbstractProject;

class PhpClassTest extends AbstractBase
{

    /**
     * @var bool
     */
    public $statusOutput = false;


    public function __construct()
    {
        //ConsoleConfig::$consoleMode = true;
    }


    public function checkProject(AbstractProject $project)
    {

        $reader = new DirectoryReader();
        $reader->path = $project->path;  // $path;
        $reader->recursiveSearch = true;

        foreach ($reader->getData() as $file) {

            if ($file->getFileExtension() == 'php') {
                if ($this->statusOutput) {
                    (new Debug())->write('Check: ' . $file->filename);
                }
                require_once $file->fullFilename;
            }

        }


    }

}