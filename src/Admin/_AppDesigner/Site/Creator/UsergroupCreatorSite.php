<?php

namespace Nemundo\Admin\AppDesigner\Site\Creator;


use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Form\Creator\UsergroupCreatorForm;
use Nemundo\Admin\AppDesigner\Navigation\AppDesignerNavigation;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class UsergroupCreatorSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Usergroup';
        $this->url = 'usergroup';
    }


    public function loadContent()
    {

        $factory = new RowFactory();
        $factory->connection = new AppDesignerConnection();
        $appRow = $factory->getAppRow();

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addApp($appRow);

        $navigation = new AppDesignerNavigation($page);
        $navigation->appId = $appRow->id;

        $form = new UsergroupCreatorForm($page);
        $form->appRow = $appRow;

        $page->render();

    }

}