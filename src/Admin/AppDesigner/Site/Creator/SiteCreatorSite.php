<?php

namespace Nemundo\Admin\AppDesigner\Site\Creator;


use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Form\Creator\SiteCreatorForm;
use Nemundo\Admin\AppDesigner\Navigation\AppDesignerNavigation;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class SiteCreatorSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Site';
        $this->url = 'site';
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

        new AppDesignerNavigation($page);

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new SiteCreatorForm($layout->col1);
        $form->appRow = $appRow;

        $page->render();

    }

}