<?php

namespace Nemundo\Admin\AppDesigner\Site\Model;


use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Package\Bootstrap\Admin\BootstrapModelAdmin;
use Nemundo\Web\Site\AbstractSite;

class AppModelAdminSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Model Admin';
        $this->url = 'model-admin';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $modelRow = (new RowFactory())->getModelRow();


        $page = new AdminTemplate();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addApp($modelRow->app);
        $breadcrumb->addModel($modelRow);
        $breadcrumb->addActiveItem('Admin');

        $className = '\\' . $modelRow->modelNamespace . '\\' . $modelRow->modelClassName . 'Model';
        $model = new $className();

        $form = new BootstrapModelAdmin($page);
        $form->model = $model;


        $page->render();

    }

}