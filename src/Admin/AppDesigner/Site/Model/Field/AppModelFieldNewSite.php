<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\Field;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Form\Field\ModelFieldForm;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class AppModelFieldNewSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->url = 'new-field';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $modelRow = $factory->getModelRow();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $typeRow = $factory->getModelFieldTypeRow();

        $page = new AdminTemplate();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addApp($modelRow->app);
        $breadcrumb->addModel($modelRow);

        $layout = new BootstrapTwoColumnLayout($page);

        $table = new AdminLabelValueTable($layout->col1);
        $table->addLabelValue('Type', $typeRow->fieldType);
        $table->addLabelValue('Class Name', $typeRow->fieldClassName);


        $className = $typeRow->fieldClassName;

        /** @var AbstractModelType $type */
        $type = new $className();

        $site = clone(AppDesignerConfig::$site->app->appModel);
        $site->addParameter(new AppParameter($modelRow->appId));
        $site->addParameter(new ModelParameter());

        $form = new ModelFieldForm($layout->col1);
        $form->connection = $conn;
        $form->modelId = $modelRow->id;
        $form->typeId = $typeRow->id;
        $form->type = $type;
        $form->redirectSite = $site;

        $page->render();

    }

}