<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\DefaultType;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldModel;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Form\Model\DefaultTypeForm;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class DefaultTypeNewSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'New Default Type';
        $this->url = 'default-type-new';
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
        $breadcrumb->addActiveItem('New Default Type');

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new DefaultTypeForm($layout->col1);
        $form->connection = $conn;
        $form->model->loadAppField();
        $form->model->appModelId->defaultValue = $modelRow->id;
        $form->model->appField->filter->andEqual((new AppModelFieldModel())->appModelId, $modelRow->id);
        $form->model->appField->filter->andEqual((new AppModelFieldModel())->active, true);

        $form->redirectSite = clone(AppDesignerConfig::$site->app->appModel);
        $form->redirectSite->addParameter(new ModelParameter($modelRow->id));

        $page->render();

    }

}