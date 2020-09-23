<?php

namespace Nemundo\Admin\AppDesigner\Site\Creator;


use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Form\Creator\ParameterCreatorForm;
use Nemundo\Admin\AppDesigner\Navigation\AppDesignerNavigation;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class ParameterCreatorSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Parameter';
        $this->url = 'parameter';
    }


    public function loadContent()
    {

        $factory = new RowFactory();
        $factory->connection = new AppDesignerConnection();
        $appRow = $factory->getAppRow();

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addApp($appRow);

        new AppDesignerNavigation($page);

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new ParameterCreatorForm($layout->col1);
        $form->appRow = $appRow;

        $page->render();

    }

}