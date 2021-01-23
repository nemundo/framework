<?php

namespace Nemundo\Admin\AppDesigner;


use Nemundo\Admin\AppDesigner\Site\AppDesignerSite;
use Nemundo\Project\AbstractProject;
use Nemundo\Project\Collection\ProjectCollection;

class AppDesignerConfig
{

    /**
     * @var AppDesignerSite
     */
    public static $site;

    /**
     * @var AbstractProject
     */
    public static $masterProject;

    /**
     * @var AbstractProject
     */
    public static $defaultProject;

    /**
     * @var ProjectCollection
     */
    public static $defaultProjectCollection;

    /**
     * @var bool
     */
    public static $deleteMode = true;

}