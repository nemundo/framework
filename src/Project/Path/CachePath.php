<?php

namespace Nemundo\Project\Path;


use Nemundo\Core\Path\AbstractPath;
use Nemundo\Project\Config\ProjectConfigReader;

class CachePath extends AbstractPath
{

    /**
     * @var string
     */
    private static $cachePath;


    /*
    public function __construct()
    {

        parent::__construct();

        if (AbstractCachePath::$cachePath == null) {
            AbstractCachePath::$cachePath = (new ProjectConfigReader())->getValue('cache_path');
        }

        $this->addPath(AbstractCachePath::$cachePath);

        //parent::__construct(AbstractCachePath::$cachePath);

    }*/


    protected function loadPath()
    {
        // TODO: Implement loadPath() method.

        if (CachePath::$cachePath == null) {
            CachePath::$cachePath = (new ProjectConfigReader())->getValue('cache_path');
        }

        $this->addPath(CachePath::$cachePath);


    }


}