<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
class AppFileTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $keepOrginalFilename;

protected function loadModel() {
$this->tableName = "app_model_file";
$this->aliasTableName = "app_model_file";
$this->label = "";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_file";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_file_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->appFieldId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appFieldId->tableName = "app_model_file";
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->aliasFieldName = "app_model_file_app_model_field";
$this->appFieldId->label = "";
$this->appFieldId->allowNullValue = false;

$this->keepOrginalFilename = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->keepOrginalFilename->tableName = "app_model_file";
$this->keepOrginalFilename->fieldName = "keep_orginal_filename";
$this->keepOrginalFilename->aliasFieldName = "app_model_file_keep_orginal_filename";
$this->keepOrginalFilename->label = "";
$this->keepOrginalFilename->allowNullValue = false;

}
public function loadAppField() {
if ($this->appField == null) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType($this, "app_model_file_app_model_field");
$this->appField->tableName = "app_model_file";
$this->appField->fieldName = "app_model_field";
$this->appField->aliasFieldName = "app_model_file_app_model_field";
$this->appField->label = "";
}
return $this;
}
}