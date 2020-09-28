<?php

namespace Nemundo\Admin\AppDesigner\Site\Model;

use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Form\Model\AppModelEditForm;
use Nemundo\Admin\AppDesigner\Navigation\AppDesignerNavigation;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class AppModelEditSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Edit Model';
        $this->url = 'edit-model';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $modelRow = $factory->getModelRow();

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addApp($modelRow->app);
        $breadcrumb->addModel($modelRow);
        $breadcrumb->addActiveItem('Edit Model');

        new AppDesignerNavigation($page);

        $layout = new BootstrapTwoColumnLayout($page);

        //$form = new AppModelFormUpdate($layout->col1);
        $form = new AppModelEditForm($layout->col1);
        $form->connection = $conn;
        $form->model->loadApp();
        $form->model->loadModelPrimaryIndex();
        $form->model->app->visible->form = false;
        $form->updateId = $modelRow->id;
        $form->redirectSite = AppDesignerConfig::$site->app->appModel;
        $form->redirectSite->addParameter(new ModelParameter($modelRow->id));
        //$form->model->action->addAfterUpdateAction(new AppModelAction());

        $page->render();

    }

}