<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppModelModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $editable;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $appId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\App\AppExternalType
*/
public $app;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $templateModelId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppTemplateModel\AppTemplateModelExternalType
*/
public $templateModel;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $modelLabel;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $modelTableName;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $modelPrimaryIndexId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType\AppModelPrimaryIndexTypeExternalType
*/
public $modelPrimaryIndex;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $modelClassName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $modelNamespace;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $modelCreateAdminOrm;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $rowClassName;

protected function loadModel() {
$this->tableName = "app_model";
$this->aliasTableName = "app_model";
$this->label = "Model";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "app_model";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "app_model_active";
$this->active->label = "Active";
$this->active->defaultValue = 1;
$this->active->allowNullValue = false;
$this->active->visible->form = false;
$this->active->visible->table = false;
$this->active->visible->view = false;

$this->editable = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->editable->tableName = "app_model";
$this->editable->fieldName = "editable";
$this->editable->aliasFieldName = "app_model_editable";
$this->editable->label = "";
$this->editable->allowNullValue = false;
$this->editable->visible->form = false;

$this->appId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appId->tableName = "app_model";
$this->appId->fieldName = "app_designer_app";
$this->appId->aliasFieldName = "app_model_app_designer_app";
$this->appId->label = "";
$this->appId->allowNullValue = false;

$this->templateModelId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->templateModelId->tableName = "app_model";
$this->templateModelId->fieldName = "template";
$this->templateModelId->aliasFieldName = "app_model_template";
$this->templateModelId->label = "";
$this->templateModelId->allowNullValue = false;
$this->loadTemplateModel();

$this->modelLabel = new \Nemundo\Model\Type\Text\TextType($this);
$this->modelLabel->tableName = "app_model";
$this->modelLabel->fieldName = "label";
$this->modelLabel->aliasFieldName = "app_model_label";
$this->modelLabel->label = "Model Label";
$this->modelLabel->validation = true;
$this->modelLabel->allowNullValue = false;
$this->modelLabel->length = 255;

$this->modelTableName = new \Nemundo\Model\Type\Text\TextType($this);
$this->modelTableName->tableName = "app_model";
$this->modelTableName->fieldName = "table_name";
$this->modelTableName->aliasFieldName = "app_model_table_name";
$this->modelTableName->label = "Table Name";
$this->modelTableName->validation = true;
$this->modelTableName->allowNullValue = false;
$this->modelTableName->length = 255;

$this->modelPrimaryIndexId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->modelPrimaryIndexId->tableName = "app_model";
$this->modelPrimaryIndexId->fieldName = "app_model_primary_index_type";
$this->modelPrimaryIndexId->aliasFieldName = "app_model_app_model_primary_index_type";
$this->modelPrimaryIndexId->label = "";
$this->modelPrimaryIndexId->allowNullValue = false;

$this->modelClassName = new \Nemundo\Model\Type\Text\TextType($this);
$this->modelClassName->tableName = "app_model";
$this->modelClassName->fieldName = "model_class_name";
$this->modelClassName->aliasFieldName = "app_model_model_class_name";
$this->modelClassName->label = "Model Class Name";
$this->modelClassName->validation = true;
$this->modelClassName->allowNullValue = false;
$this->modelClassName->length = 255;

$this->modelNamespace = new \Nemundo\Model\Type\Text\TextType($this);
$this->modelNamespace->tableName = "app_model";
$this->modelNamespace->fieldName = "model_namespace";
$this->modelNamespace->aliasFieldName = "app_model_model_namespace";
$this->modelNamespace->label = "Model Namespace";
$this->modelNamespace->validation = true;
$this->modelNamespace->allowNullValue = false;
$this->modelNamespace->length = 255;

$this->modelCreateAdminOrm = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->modelCreateAdminOrm->tableName = "app_model";
$this->modelCreateAdminOrm->fieldName = "app_model_create_admin_orm";
$this->modelCreateAdminOrm->aliasFieldName = "app_model_app_model_create_admin_orm";
$this->modelCreateAdminOrm->label = "Create Admin Orm";
$this->modelCreateAdminOrm->allowNullValue = false;

$this->rowClassName = new \Nemundo\Model\Type\Text\TextType($this);
$this->rowClassName->tableName = "app_model";
$this->rowClassName->fieldName = "row_class_name";
$this->rowClassName->aliasFieldName = "app_model_row_class_name";
$this->rowClassName->label = "Row Class Name";
$this->rowClassName->allowNullValue = true;
$this->rowClassName->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "";
$index->addType($this->modelNamespace);

$this->addDefaultType($this->modelLabel);
$this->addDefaultOrderType($this->modelTableName);
}
public function loadApp() {
if ($this->app == null) {
$this->app = new \Nemundo\Admin\AppDesigner\Data\App\AppExternalType($this, "app_model_app_designer_app");
$this->app->tableName = "app_model";
$this->app->fieldName = "app_designer_app";
$this->app->aliasFieldName = "app_model_app_designer_app";
$this->app->label = "";
}
return $this;
}
public function loadTemplateModel() {
if ($this->templateModel == null) {
$this->templateModel = new \Nemundo\Admin\AppDesigner\Data\AppTemplateModel\AppTemplateModelExternalType($this, "app_model_template");
$this->templateModel->tableName = "app_model";
$this->templateModel->fieldName = "template";
$this->templateModel->aliasFieldName = "app_model_template";
$this->templateModel->label = "";
$this->templateModel->validation = true;
}
return $this;
}
public function loadModelPrimaryIndex() {
if ($this->modelPrimaryIndex == null) {
$this->modelPrimaryIndex = new \Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType\AppModelPrimaryIndexTypeExternalType($this, "app_model_app_model_primary_index_type");
$this->modelPrimaryIndex->tableName = "app_model";
$this->modelPrimaryIndex->fieldName = "app_model_primary_index_type";
$this->modelPrimaryIndex->aliasFieldName = "app_model_app_model_primary_index_type";
$this->modelPrimaryIndex->label = "";
$this->modelPrimaryIndex->validation = true;
}
return $this;
}
}