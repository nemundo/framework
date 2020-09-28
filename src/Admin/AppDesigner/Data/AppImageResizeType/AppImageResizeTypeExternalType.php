<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
class AppImageResizeTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $resizeType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppImageResizeTypeModel::class;
$this->externalTableName = "app_model_image_resize_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->resizeType = new \Nemundo\Model\Type\Text\TextType();
$this->resizeType->fieldName = "resize_type";
$this->resizeType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->resizeType->aliasFieldName = $this->resizeType->tableName . "_" . $this->resizeType->fieldName;
$this->resizeType->label = "";
$this->addType($this->resizeType);

}
}