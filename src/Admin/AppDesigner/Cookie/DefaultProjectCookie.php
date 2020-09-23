<?php

namespace Nemundo\Admin\AppDesigner\Cookie;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Core\Php\PhpClass;
use Nemundo\Project\AbstractProject;
use Nemundo\Core\Http\Cookie\AbstractCookie;

class DefaultProjectCookie extends AbstractCookie
{

    protected function loadCookie()
    {
        $this->cookieName = 'default-project';
    }


    public function getDefaultProject()
    {

        /** @var AbstractProject $project */
        $project = null;

        $phpClass = new PhpClass($this->getValue());

        if ($phpClass->exists()) {
            $project = $phpClass->getObject();
        } else {
            $project = AppDesignerConfig::$masterProject;
        }

        return $project;

    }

}