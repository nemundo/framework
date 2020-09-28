<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
class AppModelDefaultOrderTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $appModelId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType
*/
public $appModel;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppModelDefaultOrderTypeModel::class;
$this->externalTableName = "app_model_default_order_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->appModelId = new \Nemundo\Model\Type\Id\IdType();
$this->appModelId->fieldName = "app_model";
$this->appModelId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appModelId->aliasFieldName = $this->appModelId->tableName ."_".$this->appModelId->fieldName;
$this->appModelId->label = "";
$this->addType($this->appModelId);

$this->appFieldId = new \Nemundo\Model\Type\Id\IdType();
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appFieldId->aliasFieldName = $this->appFieldId->tableName ."_".$this->appFieldId->fieldName;
$this->appFieldId->label = "";
$this->addType($this->appFieldId);

$this->itemOrder = new \Nemundo\Model\Type\Number\NumberType();
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->itemOrder->aliasFieldName = $this->itemOrder->tableName . "_" . $this->itemOrder->fieldName;
$this->itemOrder->label = "";
$this->addType($this->itemOrder);

}
public function loadAppModel() {
if ($this->appModel == null) {
$this->appModel = new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType(null, $this->parentFieldName . "_app_model");
$this->appModel->fieldName = "app_model";
$this->appModel->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appModel->aliasFieldName = $this->appModel->tableName ."_".$this->appModel->fieldName;
$this->appModel->label = "";
$this->addType($this->appModel);
}
return $this;
}
public function loadAppField() {
if ($this->appField == null) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType(null, $this->parentFieldName . "_app_model_field");
$this->appField->fieldName = "app_model_field";
$this->appField->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appField->aliasFieldName = $this->appField->tableName ."_".$this->appField->fieldName;
$this->appField->label = "";
$this->addType($this->appField);
}
return $this;
}
}