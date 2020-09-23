<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
class AppModelFieldTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $fieldType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $fieldClassName;

protected function loadModel() {
$this->tableName = "app_model_field_type";
$this->aliasTableName = "app_model_field_type";
$this->label = "Field Type";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_field_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_field_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->fieldType = new \Nemundo\Model\Type\Text\TextType($this);
$this->fieldType->tableName = "app_model_field_type";
$this->fieldType->fieldName = "field_type";
$this->fieldType->aliasFieldName = "app_model_field_type_field_type";
$this->fieldType->label = "";
$this->fieldType->allowNullValue = false;
$this->fieldType->length = 255;

$this->fieldClassName = new \Nemundo\Model\Type\Text\TextType($this);
$this->fieldClassName->tableName = "app_model_field_type";
$this->fieldClassName->fieldName = "field_class_name";
$this->fieldClassName->aliasFieldName = "app_model_field_type_field_class_name";
$this->fieldClassName->label = "";
$this->fieldClassName->allowNullValue = false;
$this->fieldClassName->length = 255;

$this->addDefaultType($this->fieldType);
$this->addDefaultOrderType($this->fieldType);
}
}