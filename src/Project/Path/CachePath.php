<?php

namespace Nemundo\Project\Path;


use Nemundo\Core\Path\AbstractPath;
use Nemundo\Project\Config\ProjectConfigReader;

class CachePath extends AbstractCachePath
{

    /**
     * @var string
     */
    /*private static $cachePath;


    public function __construct()
    {

        if (CachePath::$cachePath == null) {
            CachePath::$cachePath = (new ProjectConfigReader())->getValue('cache_path');
        }

        parent::__construct(CachePath::$cachePath);

    }*/

}