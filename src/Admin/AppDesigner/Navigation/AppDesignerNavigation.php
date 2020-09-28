<?php

namespace Nemundo\Admin\AppDesigner\Navigation;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Package\Bootstrap\Tabs\BootstrapSiteTabs;


class AppDesignerNavigation extends BootstrapSiteTabs
{

    /**
     * @var string
     */
    public $appId;


    public function getContent()
    {

        $appParameter = new AppParameter($this->appId);

        $this->site = AppDesignerConfig::$site->app;
        $this->site->addParameter($appParameter);
        $this->site->appModel->addParameter($appParameter);
        $this->site->siteCreator->addParameter($appParameter);
        $this->site->usergroupCreator->addParameter($appParameter);
        $this->site->parameterCreator->addParameter($appParameter);

        return parent::getContent();
    }

}