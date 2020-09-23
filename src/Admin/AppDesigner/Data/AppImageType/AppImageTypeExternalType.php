<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

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
public $size;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $resizeTypeId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppImageResizeType\AppImageResizeTypeExternalType
*/
public $resizeType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppImageTypeModel::class;
$this->externalTableName = "app_model_image";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->appFieldId = new \Nemundo\Model\Type\Id\IdType();
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appFieldId->aliasFieldName = $this->appFieldId->tableName ."_".$this->appFieldId->fieldName;
$this->appFieldId->label = "";
$this->addType($this->appFieldId);

$this->size = new \Nemundo\Model\Type\Number\NumberType();
$this->size->fieldName = "size";
$this->size->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->size->aliasFieldName = $this->size->tableName . "_" . $this->size->fieldName;
$this->size->label = "";
$this->addType($this->size);

$this->resizeTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->resizeTypeId->fieldName = "resize_type";
$this->resizeTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->resizeTypeId->aliasFieldName = $this->resizeTypeId->tableName ."_".$this->resizeTypeId->fieldName;
$this->resizeTypeId->label = "";
$this->addType($this->resizeTypeId);

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
public function loadResizeType() {
if ($this->resizeType == null) {
$this->resizeType = new \Nemundo\Admin\AppDesigner\Data\AppImageResizeType\AppImageResizeTypeExternalType(null, $this->parentFieldName . "_resize_type");
$this->resizeType->fieldName = "resize_type";
$this->resizeType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->resizeType->aliasFieldName = $this->resizeType->tableName ."_".$this->resizeType->fieldName;
$this->resizeType->label = "";
$this->addType($this->resizeType);
}
return $this;
}
}