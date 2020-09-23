<?php

namespace Nemundo\Admin\AppDesigner\Site\Model;

use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Form\Model\AppModelForm;
use Nemundo\Admin\AppDesigner\Navigation\AppDesignerNavigation;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class AppModelNewSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'New Model';
        $this->url = 'new-model';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $appRow = $factory->getAppRow();

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addApp($appRow);
        $breadcrumb->addActiveItem('New Model');

        new AppDesignerNavigation($page);

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new AppModelForm($layout->col1);
        $form->connection = $conn;
        $form->appRow = $appRow;
        $form->redirectSite = clone(AppDesignerConfig::$site->app->appModel);

        $page->render();

    }

}