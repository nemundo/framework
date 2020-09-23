<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
class AppPhpClassTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $phpClassName;

protected function loadModel() {
$this->tableName = "app_model_php_class";
$this->aliasTableName = "app_model_php_class";
$this->label = "";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_php_class";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_php_class_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->appFieldId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appFieldId->tableName = "app_model_php_class";
$this->appFieldId->fieldName = "app_model_field";
$this->appFieldId->aliasFieldName = "app_model_php_class_app_model_field";
$this->appFieldId->label = "";
$this->appFieldId->allowNullValue = false;

$this->phpClassName = new \Nemundo\Model\Type\Text\TextType($this);
$this->phpClassName->tableName = "app_model_php_class";
$this->phpClassName->fieldName = "php_class_name";
$this->phpClassName->aliasFieldName = "app_model_php_class_php_class_name";
$this->phpClassName->label = "";
$this->phpClassName->allowNullValue = false;
$this->phpClassName->length = 255;

}
public function loadAppField() {
if ($this->appField == null) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldExternalType($this, "app_model_php_class_app_model_field");
$this->appField->tableName = "app_model_php_class";
$this->appField->fieldName = "app_model_field";
$this->appField->aliasFieldName = "app_model_php_class_app_model_field";
$this->appField->label = "";
}
return $this;
}
}