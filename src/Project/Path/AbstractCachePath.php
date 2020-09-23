<?php

namespace Nemundo\Project\Path;


use Nemundo\Core\Path\AbstractPath;
use Nemundo\Project\Config\ProjectConfigReader;

abstract class AbstractCachePath extends AbstractPath
{

    /**
     * @var string
     */
    private static $cachePath;


    public function __construct()
    {

        if (AbstractCachePath::$cachePath == null) {
            AbstractCachePath::$cachePath = (new ProjectConfigReader())->getValue('cache_path');
        }

        parent::__construct(AbstractCachePath::$cachePath);

    }

}