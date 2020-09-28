<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
class AppModelDefaultOrderTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $appModelId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType
*/
public $appModel;

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
$this->tableName = "app_model_default_order_type";
$this->aliasTableName = "app_model_default_order_type";
$this->label = "Default Order Type";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_default_order_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_default_order_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->appModelId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appModelId->tableName = "app_model_default_order_type";
$this->appModelId->fieldName = "app_model";
$this->appModelId->aliasFieldName = "app_model_default_order_type_app_model";
$this->appModelId->label = "";
$this->appModelId->allowNullValue = false;

$this->appFieldId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appFieldId->tableName = "app_model_default_order_type";
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->aliasFieldName = "app_model_default_order_type_app_model_field";
$this->appFieldId->label = "";
$this->appFieldId->allowNullValue = false;

$this->itemOrder = new \Nemundo\Model\Type\Number\NumberType($this);
$this->itemOrder->tableName = "app_model_default_order_type";
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->aliasFieldName = "app_model_default_order_type_item_order";
$this->itemOrder->label = "";
$this->itemOrder->allowNullValue = false;
$this->itemOrder->visible->form = false;
$this->itemOrder->visible->table = false;
$this->itemOrder->visible->view = false;

$this->addDefaultOrderType($this->itemOrder);
}
public function loadAppModel() {
if ($this->appModel == null) {
$this->appModel = new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType($this, "app_model_default_order_type_app_model");
$this->appModel->tableName = "app_model_default_order_type";
$this->appModel->fieldName = "app_model";
$this->appModel->aliasFieldName = "app_model_default_order_type_app_model";
$this->appModel->label = "";
$this->appModel->visible->form = false;
$this->appModel->visible->table = false;
}
return $this;
}
public function loadAppField() {
if ($this->appField == null) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType($this, "app_model_default_order_type_app_model_field");
$this->appField->tableName = "app_model_default_order_type";
$this->appField->fieldName = "app_model_field";
$this->appField->aliasFieldName = "app_model_default_order_type_app_model_field";
$this->appField->label = "";
$this->appField->validation = true;
}
return $this;
}
}