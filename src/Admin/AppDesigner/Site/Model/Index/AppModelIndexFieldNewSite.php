<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\Index;


use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldModel;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Form\Index\ModelIndexFieldForm;
use Nemundo\Admin\AppDesigner\Parameter\ModelIndexParameter;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class AppModelIndexFieldNewSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'New Field';
        $this->url = 'new-field';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $indexParameter = new ModelIndexParameter();
        $indexId = $indexParameter->getValue();

        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $indexRow = $factory->getModelIndexRow();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addApp($indexRow->appModel->app);
        $breadcrumb->addModel($indexRow->appModel);

        $layout = new BootstrapTwoColumnLayout($page);

        $title = new AdminTitle($layout->col1);
        $title->content = 'Index: ' . $indexRow->appModel->modelLabel;


        $form = new ModelIndexFieldForm($layout->col1);  // new AppModelIndexFieldForm($layout->col1);
        $form->connection = $conn;
        $form->modelId = $indexRow->appModelId;
        $form->model->appIndexId->defaultValue = $indexId;
        $form->model->appField->filter->andEqual((new AppModelFieldModel())->appModelId, $indexRow->appModelId);
        $form->model->appField->filter->andEqual((new AppModelFieldModel())->active, true);
        //$form->model->action->addInsertAction(new AppModelIndexFieldAction());
        $form->redirectSite = AppModelIndexSite::$site;
        $form->redirectSite->addParameter($indexParameter);

        $page->render();

    }

}