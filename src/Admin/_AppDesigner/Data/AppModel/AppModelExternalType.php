<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppModelExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $appId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\App\AppExternalType
*/
public $app;

/**
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppModelModel::class;
$this->externalTableName = "app_model";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

$this->editable = new \Nemundo\Model\Type\Number\YesNoType();
$this->editable->fieldName = "editable";
$this->editable->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->editable->aliasFieldName = $this->editable->tableName . "_" . $this->editable->fieldName;
$this->editable->label = "";
$this->addType($this->editable);

$this->appId = new \Nemundo\Model\Type\Id\IdType();
$this->appId->fieldName = "app_designer_app";
$this->appId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appId->aliasFieldName = $this->appId->tableName ."_".$this->appId->fieldName;
$this->appId->label = "";
$this->addType($this->appId);

$this->templateModelId = new \Nemundo\Model\Type\Id\IdType();
$this->templateModelId->fieldName = "template";
$this->templateModelId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->templateModelId->aliasFieldName = $this->templateModelId->tableName ."_".$this->templateModelId->fieldName;
$this->templateModelId->label = "";
$this->addType($this->templateModelId);

$this->modelLabel = new \Nemundo\Model\Type\Text\TextType();
$this->modelLabel->fieldName = "label";
$this->modelLabel->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->modelLabel->aliasFieldName = $this->modelLabel->tableName . "_" . $this->modelLabel->fieldName;
$this->modelLabel->label = "Model Label";
$this->addType($this->modelLabel);

$this->modelTableName = new \Nemundo\Model\Type\Text\TextType();
$this->modelTableName->fieldName = "table_name";
$this->modelTableName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->modelTableName->aliasFieldName = $this->modelTableName->tableName . "_" . $this->modelTableName->fieldName;
$this->modelTableName->label = "Table Name";
$this->addType($this->modelTableName);

$this->modelPrimaryIndexId = new \Nemundo\Model\Type\Id\IdType();
$this->modelPrimaryIndexId->fieldName = "app_model_primary_index_type";
$this->modelPrimaryIndexId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->modelPrimaryIndexId->aliasFieldName = $this->modelPrimaryIndexId->tableName ."_".$this->modelPrimaryIndexId->fieldName;
$this->modelPrimaryIndexId->label = "";
$this->addType($this->modelPrimaryIndexId);

$this->modelClassName = new \Nemundo\Model\Type\Text\TextType();
$this->modelClassName->fieldName = "model_class_name";
$this->modelClassName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->modelClassName->aliasFieldName = $this->modelClassName->tableName . "_" . $this->modelClassName->fieldName;
$this->modelClassName->label = "Model Class Name";
$this->addType($this->modelClassName);

$this->modelNamespace = new \Nemundo\Model\Type\Text\TextType();
$this->modelNamespace->fieldName = "model_namespace";
$this->modelNamespace->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->modelNamespace->aliasFieldName = $this->modelNamespace->tableName . "_" . $this->modelNamespace->fieldName;
$this->modelNamespace->label = "Model Namespace";
$this->addType($this->modelNamespace);

$this->modelCreateAdminOrm = new \Nemundo\Model\Type\Number\YesNoType();
$this->modelCreateAdminOrm->fieldName = "app_model_create_admin_orm";
$this->modelCreateAdminOrm->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->modelCreateAdminOrm->aliasFieldName = $this->modelCreateAdminOrm->tableName . "_" . $this->modelCreateAdminOrm->fieldName;
$this->modelCreateAdminOrm->label = "Create Admin Orm";
$this->addType($this->modelCreateAdminOrm);

$this->rowClassName = new \Nemundo\Model\Type\Text\TextType();
$this->rowClassName->fieldName = "row_class_name";
$this->rowClassName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->rowClassName->aliasFieldName = $this->rowClassName->tableName . "_" . $this->rowClassName->fieldName;
$this->rowClassName->label = "Row Class Name";
$this->addType($this->rowClassName);

}
public function loadApp() {
if ($this->app == null) {
$this->app = new \Nemundo\Admin\AppDesigner\Data\App\AppExternalType(null, $this->parentFieldName . "_app_designer_app");
$this->app->fieldName = "app_designer_app";
$this->app->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->app->aliasFieldName = $this->app->tableName ."_".$this->app->fieldName;
$this->app->label = "";
$this->addType($this->app);
}
return $this;
}
public function loadTemplateModel() {
if ($this->templateModel == null) {
$this->templateModel = new \Nemundo\Admin\AppDesigner\Data\AppTemplateModel\AppTemplateModelExternalType(null, $this->parentFieldName . "_template");
$this->templateModel->fieldName = "template";
$this->templateModel->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->templateModel->aliasFieldName = $this->templateModel->tableName ."_".$this->templateModel->fieldName;
$this->templateModel->label = "";
$this->addType($this->templateModel);
}
return $this;
}
public function loadModelPrimaryIndex() {
if ($this->modelPrimaryIndex == null) {
$this->modelPrimaryIndex = new \Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType\AppModelPrimaryIndexTypeExternalType(null, $this->parentFieldName . "_app_model_primary_index_type");
$this->modelPrimaryIndex->fieldName = "app_model_primary_index_type";
$this->modelPrimaryIndex->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->modelPrimaryIndex->aliasFieldName = $this->modelPrimaryIndex->tableName ."_".$this->modelPrimaryIndex->fieldName;
$this->modelPrimaryIndex->label = "";
$this->addType($this->modelPrimaryIndex);
}
return $this;
}
}