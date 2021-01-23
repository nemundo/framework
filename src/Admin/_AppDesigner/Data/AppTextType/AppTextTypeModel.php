<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
class AppTextTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $length;

protected function loadModel() {
$this->tableName = "app_model_text";
$this->aliasTableName = "app_model_text";
$this->label = "";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_text";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_text_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->appFieldId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appFieldId->tableName = "app_model_text";
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->aliasFieldName = "app_model_text_app_model_field";
$this->appFieldId->label = "";
$this->appFieldId->allowNullValue = false;

$this->length = new \Nemundo\Model\Type\Number\NumberType($this);
$this->length->tableName = "app_model_text";
$this->length->fieldName = "length";
$this->length->aliasFieldName = "app_model_text_length";
$this->length->label = "";
$this->length->allowNullValue = false;

}
public function loadAppField() {
if ($this->appField == null) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType($this, "app_model_text_app_model_field");
$this->appField->tableName = "app_model_text";
$this->appField->fieldName = "app_model_field";
$this->appField->aliasFieldName = "app_model_text_app_model_field";
$this->appField->label = "";
}
return $this;
}
}