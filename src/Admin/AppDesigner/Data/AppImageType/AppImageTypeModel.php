<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $size;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $resizeTypeId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppImageResizeType\AppImageResizeTypeExternalType
*/
public $resizeType;

protected function loadModel() {
$this->tableName = "app_model_image";
$this->aliasTableName = "app_model_image";
$this->label = "";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_image";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_image_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->appFieldId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appFieldId->tableName = "app_model_image";
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->aliasFieldName = "app_model_image_app_model_field";
$this->appFieldId->label = "";
$this->appFieldId->allowNullValue = false;

$this->size = new \Nemundo\Model\Type\Number\NumberType($this);
$this->size->tableName = "app_model_image";
$this->size->fieldName = "size";
$this->size->aliasFieldName = "app_model_image_size";
$this->size->label = "";
$this->size->allowNullValue = false;

$this->resizeTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->resizeTypeId->tableName = "app_model_image";
$this->resizeTypeId->fieldName = "resize_type";
$this->resizeTypeId->aliasFieldName = "app_model_image_resize_type";
$this->resizeTypeId->label = "";
$this->resizeTypeId->allowNullValue = false;

}
public function loadAppField() {
if ($this->appField == null) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType($this, "app_model_image_app_model_field");
$this->appField->tableName = "app_model_image";
$this->appField->fieldName = "app_model_field";
$this->appField->aliasFieldName = "app_model_image_app_model_field";
$this->appField->label = "";
}
return $this;
}
public function loadResizeType() {
if ($this->resizeType == null) {
$this->resizeType = new \Nemundo\Admin\AppDesigner\Data\AppImageResizeType\AppImageResizeTypeExternalType($this, "app_model_image_resize_type");
$this->resizeType->tableName = "app_model_image";
$this->resizeType->fieldName = "resize_type";
$this->resizeType->aliasFieldName = "app_model_image_resize_type";
$this->resizeType->label = "";
}
return $this;
}
}