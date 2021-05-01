<?php

namespace Nemundo\Project;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Path\Path;

// nach Dev???
abstract class AbstractProject extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $project;

    /**
     * @var string
     */
    public $projectName;

    /**
     * @var string
     */
    public $namespace;

    /**
     * @var string
     */
    public $path;

    /**
     * @var string
     */
    public $modelPath;

    //public $projectPath;


    abstract protected function loadProject();

    public function __construct()
    {


        $this->loadProject();



    }

}