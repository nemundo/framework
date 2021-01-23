<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
class AppModelIndexFieldExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $appIndexId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexExternalType
*/
public $appIndex;

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
$this->externalModelClassName = AppModelIndexFieldModel::class;
$this->externalTableName = "app_model_index_field";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->appIndexId = new \Nemundo\Model\Type\Id\IdType();
$this->appIndexId->fieldName = "app_model_index";
$this->appIndexId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appIndexId->aliasFieldName = $this->appIndexId->tableName ."_".$this->appIndexId->fieldName;
$this->appIndexId->label = "";
$this->addType($this->appIndexId);

$this->appFieldId = new \Nemundo\Model\Type\Id\IdType();
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appFieldId->aliasFieldName = $this->appFieldId->tableName ."_".$this->appFieldId->fieldName;
$this->appFieldId->label = "Field";
$this->addType($this->appFieldId);

$this->itemOrder = new \Nemundo\Model\Type\Number\NumberType();
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->itemOrder->aliasFieldName = $this->itemOrder->tableName . "_" . $this->itemOrder->fieldName;
$this->itemOrder->label = "";
$this->addType($this->itemOrder);

}
public function loadAppIndex() {
if ($this->appIndex == null) {
$this->appIndex = new \Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexExternalType(null, $this->parentFieldName . "_app_model_index");
$this->appIndex->fieldName = "app_model_index";
$this->appIndex->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appIndex->aliasFieldName = $this->appIndex->tableName ."_".$this->appIndex->fieldName;
$this->appIndex->label = "";
$this->addType($this->appIndex);
}
return $this;
}
public function loadAppField() {
if ($this->appField == null) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType(null, $this->parentFieldName . "_app_model_field");
$this->appField->fieldName = "app_model_field";
$this->appField->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appField->aliasFieldName = $this->appField->tableName ."_".$this->appField->fieldName;
$this->appField->label = "Field";
$this->addType($this->appField);
}
return $this;
}
}