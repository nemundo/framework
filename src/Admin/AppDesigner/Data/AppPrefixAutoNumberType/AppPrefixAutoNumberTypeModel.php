<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
class AppPrefixAutoNumberTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\Text\TextType
*/
public $prefix;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $startNumber;

protected function loadModel() {
$this->tableName = "app_model_prefix_auto_number";
$this->aliasTableName = "app_model_prefix_auto_number";
$this->label = "";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_prefix_auto_number";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_prefix_auto_number_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->appFieldId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appFieldId->tableName = "app_model_prefix_auto_number";
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->aliasFieldName = "app_model_prefix_auto_number_app_model_field";
$this->appFieldId->label = "";
$this->appFieldId->allowNullValue = false;

$this->prefix = new \Nemundo\Model\Type\Text\TextType($this);
$this->prefix->tableName = "app_model_prefix_auto_number";
$this->prefix->fieldName = "prefix";
$this->prefix->aliasFieldName = "app_model_prefix_auto_number_prefix";
$this->prefix->label = "";
$this->prefix->allowNullValue = false;
$this->prefix->length = 255;

$this->startNumber = new \Nemundo\Model\Type\Number\NumberType($this);
$this->startNumber->tableName = "app_model_prefix_auto_number";
$this->startNumber->fieldName = "start_number";
$this->startNumber->aliasFieldName = "app_model_prefix_auto_number_start_number";
$this->startNumber->label = "";
$this->startNumber->allowNullValue = false;

}
public function loadAppField() {
if ($this->appField == null) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType($this, "app_model_prefix_auto_number_app_model_field");
$this->appField->tableName = "app_model_prefix_auto_number";
$this->appField->fieldName = "app_model_field";
$this->appField->aliasFieldName = "app_model_prefix_auto_number_app_model_field";
$this->appField->label = "";
}
return $this;
}
}