<?php

namespace Nemundo\Admin\AppDesigner\Site\App;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Form\App\AppCustomFormUpdate;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\FontAwesome\Icon\EditIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;


class AppEditSite extends AbstractIconSite
{

    protected function loadSite()
    {
        $this->title = 'Edit App';
        $this->url = 'edit';
        $this->icon = new EditIcon();
        //$this->menuActive = false;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addActiveItem('App edit');

        $form = new AppCustomFormUpdate($page);
        $form->connection = new AppDesignerConnection();
        $form->updateId = (new AppParameter())->getValue();
        $form->redirectSite = AppDesignerConfig::$site;

        $page->render();

    }

}