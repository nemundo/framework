<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\Index;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexForm;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class AppModelIndexNewSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'New Index';
        $this->url = 'index-new';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $modelRow = $factory->getModelRow();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addApp($modelRow->app);
        $breadcrumb->addModel($modelRow);

        $modelParameter = new ModelParameter();
        $modelId = $modelParameter->getValue();

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new AppModelIndexForm($layout->col1);
        $form->connection = $conn;
        $form->model->loadAppModel();
        $form->model->loadIndexType();
        $form->model->appModel->visible->form = false;
        $form->model->appModel->defaultValue = $modelId;

        $site = clone(AppDesignerConfig::$site->app->appModel);
        $site->addParameter($modelParameter);
        $form->redirectSite = $site;

        $page->render();

    }
}