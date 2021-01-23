<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
class AppExternalUserTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $appLoadModel;

protected function loadModel() {
$this->tableName = "app_model_external_user";
$this->aliasTableName = "app_model_external_user";
$this->label = "";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_external_user";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_external_user_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->appFieldId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appFieldId->tableName = "app_model_external_user";
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->aliasFieldName = "app_model_external_user_app_model_field";
$this->appFieldId->label = "";
$this->appFieldId->allowNullValue = false;

$this->appLoadModel = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->appLoadModel->tableName = "app_model_external_user";
$this->appLoadModel->fieldName = "load_model";
$this->appLoadModel->aliasFieldName = "app_model_external_user_load_model";
$this->appLoadModel->label = "";
$this->appLoadModel->allowNullValue = false;

}
public function loadAppField() {
if ($this->appField == null) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType($this, "app_model_external_user_app_model_field");
$this->appField->tableName = "app_model_external_user";
$this->appField->fieldName = "app_model_field";
$this->appField->aliasFieldName = "app_model_external_user_app_model_field";
$this->appField->label = "";
}
return $this;
}
}