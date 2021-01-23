<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
class AppModelIndexFieldModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $appIndexId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexExternalType
*/
public $appIndex;

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
public $itemOrder;

protected function loadModel() {
$this->tableName = "app_model_index_field";
$this->aliasTableName = "app_model_index_field";
$this->label = "Index";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_index_field";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_index_field_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->appIndexId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appIndexId->tableName = "app_model_index_field";
$this->appIndexId->fieldName = "app_model_index";
$this->appIndexId->aliasFieldName = "app_model_index_field_app_model_index";
$this->appIndexId->label = "";
$this->appIndexId->allowNullValue = false;

$this->appFieldId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appFieldId->tableName = "app_model_index_field";
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->aliasFieldName = "app_model_index_field_app_model_field";
$this->appFieldId->label = "Field";
$this->appFieldId->allowNullValue = false;
$this->loadAppField();

$this->itemOrder = new \Nemundo\Model\Type\Number\NumberType($this);
$this->itemOrder->tableName = "app_model_index_field";
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->aliasFieldName = "app_model_index_field_item_order";
$this->itemOrder->label = "";
$this->itemOrder->allowNullValue = false;
$this->itemOrder->visible->form = false;

}
public function loadAppIndex() {
if ($this->appIndex == null) {
$this->appIndex = new \Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexExternalType($this, "app_model_index_field_app_model_index");
$this->appIndex->tableName = "app_model_index_field";
$this->appIndex->fieldName = "app_model_index";
$this->appIndex->aliasFieldName = "app_model_index_field_app_model_index";
$this->appIndex->label = "";
$this->appIndex->visible->form = false;
$this->appIndex->visible->table = false;
}
return $this;
}
public function loadAppField() {
if ($this->appField == null) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType($this, "app_model_index_field_app_model_field");
$this->appField->tableName = "app_model_index_field";
$this->appField->fieldName = "app_model_field";
$this->appField->aliasFieldName = "app_model_index_field_app_model_field";
$this->appField->label = "Field";
}
return $this;
}
}