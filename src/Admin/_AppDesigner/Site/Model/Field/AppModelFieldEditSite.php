<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\Field;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Form\Field\ModelFieldForm;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;


class AppModelFieldEditSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->url = 'field-edit';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $fieldRow = $factory->getModelFieldRow();

        new AppDesignerBreadcrumb($page);

        $modelId = $fieldRow->appModelId;
        $typeId = $fieldRow->appFieldTypeId;

        $layout = new BootstrapTwoColumnLayout($page);

        $table = new AdminLabelValueTable($layout->col1);
        $table->addLabelValue('Type', $fieldRow->appFieldType->fieldType);
        $table->addLabelValue('Class Name', $fieldRow->appFieldType->fieldClassName);

        $className = $fieldRow->appFieldType->fieldClassName;

        /** @var AbstractModelType $type */
        $type = new $className();

        $site = clone(AppDesignerConfig::$site->app->appModel);
        $site->addParameter(new ModelParameter($fieldRow->appModelId));

        $form = new ModelFieldForm($layout->col1);
        $form->connection = $conn;
        $form->modelId = $modelId;
        $form->typeId = $typeId;
        $form->type = $type;
        $form->fieldRow = $fieldRow;
        $form->redirectSite = $site;

        $page->render();

    }

}