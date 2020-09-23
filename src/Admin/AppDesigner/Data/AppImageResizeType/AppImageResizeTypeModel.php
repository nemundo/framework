<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
class AppImageResizeTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $resizeType;

protected function loadModel() {
$this->tableName = "app_model_image_resize_type";
$this->aliasTableName = "app_model_image_resize_type";
$this->label = "";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_image_resize_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_image_resize_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->resizeType = new \Nemundo\Model\Type\Text\TextType($this);
$this->resizeType->tableName = "app_model_image_resize_type";
$this->resizeType->fieldName = "resize_type";
$this->resizeType->aliasFieldName = "app_model_image_resize_type_resize_type";
$this->resizeType->label = "";
$this->resizeType->allowNullValue = false;
$this->resizeType->length = 255;

$this->addDefaultType($this->resizeType);
}
}