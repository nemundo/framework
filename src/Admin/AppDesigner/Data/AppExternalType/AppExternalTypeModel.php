<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
class AppExternalTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $appFieldId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType
*/
public $appField;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $externalModelId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType
*/
public $externalModel;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $appLoadModel;

protected function loadModel() {
$this->tableName = "app_model_external";
$this->aliasTableName = "app_model_external";
$this->label = "";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_external";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_external_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->appFieldId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appFieldId->tableName = "app_model_external";
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->aliasFieldName = "app_model_external_app_model_field";
$this->appFieldId->label = "";
$this->appFieldId->allowNullValue = false;

$this->externalModelId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->externalModelId->tableName = "app_model_external";
$this->externalModelId->fieldName = "external_field";
$this->externalModelId->aliasFieldName = "app_model_external_external_field";
$this->externalModelId->label = "";
$this->externalModelId->allowNullValue = false;

$this->appLoadModel = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->appLoadModel->tableName = "app_model_external";
$this->appLoadModel->fieldName = "load_model";
$this->appLoadModel->aliasFieldName = "app_model_external_load_model";
$this->appLoadModel->label = "";
$this->appLoadModel->allowNullValue = false;

}
public function loadAppField() {
if ($this->appField == null) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType($this, "app_model_external_app_model_field");
$this->appField->tableName = "app_model_external";
$this->appField->fieldName = "app_model_field";
$this->appField->aliasFieldName = "app_model_external_app_model_field";
$this->appField->label = "";
}
return $this;
}
public function loadExternalModel() {
if ($this->externalModel == null) {
$this->externalModel = new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType($this, "app_model_external_external_field");
$this->externalModel->tableName = "app_model_external";
$this->externalModel->fieldName = "external_field";
$this->externalModel->aliasFieldName = "app_model_external_external_field";
$this->externalModel->label = "";
}
return $this;
}
}