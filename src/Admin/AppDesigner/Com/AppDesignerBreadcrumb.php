<?php

namespace Nemundo\Admin\AppDesigner\Com;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Data\App\AppRow;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelRow;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;

class AppDesignerBreadcrumb extends BootstrapBreadcrumb
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->addSite(AppDesignerConfig::$site);

    }


    public function addApp(AppRow $row)
    {

        $site = clone(AppDesignerConfig::$site->app);
        $site->title = $row->appName;
        $site->addParameter(new AppParameter($row->id));
        $this->addSite($site);

    }


    public function addModel(AppModelRow $row = null)
    {

        if ($row !== null) {
            $site = clone(AppDesignerConfig::$site->app->appModel);
            $site->title = $row->modelLabel;
            $site->addParameter(new ModelParameter($row->id));
            $this->addSite($site);
        }

    }

}