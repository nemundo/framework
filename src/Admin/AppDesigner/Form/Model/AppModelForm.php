<?php

namespace Nemundo\Admin\AppDesigner\Form\Model;

use Nemundo\Admin\AppDesigner\Data\App\AppRow;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelRow;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Db\Index\AutoIncrementIdPrimaryIndex;
use Nemundo\Orm\Model\Template\DefaultOrmModel;

class AppModelForm extends \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelForm
{

    use LibraryTrait;

    /**
     * @var AppRow
     */
    public $appRow;

    /**
     * @var AppModelRow
     */
    public $modelRow;

    public function getContent()
    {

        $this->model->loadTemplateModel();
        $this->model->loadModelPrimaryIndex();

        if ($this->modelRow == null) {

            $this->model->templateModel->defaultValue = (new DefaultOrmModel())->templateId;

            $tableNamePrefix = $this->appRow->appPrefix . '_';
            $namespacePrefix = $this->appRow->appNamespace . '\\Data\\';

            $this->model->active->visible->form = false;
            $this->model->active->defaultValue = true;

            $this->model->editable->visible->form = false;
            $this->model->editable->defaultValue = true;

            $this->model->modelTableName->defaultValue = $tableNamePrefix;
            $this->model->modelNamespace->defaultValue = $namespacePrefix;

            $this->model->modelPrimaryIndex->defaultValue = (new AutoIncrementIdPrimaryIndex())->primaryIndexId;

            $this->addJqueryScript('$("#' . $this->model->modelLabel->fieldName . '").keyup(function() {');
            $this->addJqueryScript('value = $("#' . $this->model->modelLabel->fieldName . '" ).val();');
            $this->addJqueryScript('tableName = "' . $tableNamePrefix . '" + value.toLowerCase().replace(/ /g, "_");');
            $this->addJqueryScript('className = value.replace(/ /g, "");');
            $this->addJqueryScript('namespace = "' . (new Text($namespacePrefix))->replace('\\', '\\\\')->getValue() . '" + value.replace(/ /g, "");');
            $this->addJqueryScript('$("#' . $this->model->modelTableName->fieldName . '" ).val(tableName);');
            $this->addJqueryScript('$("#' . $this->model->modelClassName->fieldName . '" ).val(className);');
            $this->addJqueryScript('$("#' . $this->model->modelNamespace->fieldName . '" ).val(namespace);');

            $this->addJqueryScript('});');

        }

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $this->model->appId->defaultValue = $this->appRow->id;

        $modelId = parent::onSubmit();

        $orm = new AppDesignerModelOrmSetup();
        $orm->connection = $this->connection;
        $orm->createOrm($modelId);

        $this->redirectSite->addParameter(new ModelParameter($modelId));

        return $modelId;

    }

}