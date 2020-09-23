<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
class AppModelIndexTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $indexType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $indexTypeClassName;

protected function loadModel() {
$this->tableName = "app_model_index_type";
$this->aliasTableName = "app_model_index_type";
$this->label = "Index Type";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_index_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_index_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->indexType = new \Nemundo\Model\Type\Text\TextType($this);
$this->indexType->tableName = "app_model_index_type";
$this->indexType->fieldName = "index_type";
$this->indexType->aliasFieldName = "app_model_index_type_index_type";
$this->indexType->label = "";
$this->indexType->allowNullValue = false;
$this->indexType->length = 255;

$this->indexTypeClassName = new \Nemundo\Model\Type\Text\TextType($this);
$this->indexTypeClassName->tableName = "app_model_index_type";
$this->indexTypeClassName->fieldName = "index_type_class_name";
$this->indexTypeClassName->aliasFieldName = "app_model_index_type_index_type_class_name";
$this->indexTypeClassName->label = "";
$this->indexTypeClassName->allowNullValue = false;
$this->indexTypeClassName->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "";
$index->addType($this->indexTypeClassName);

$this->addDefaultType($this->indexType);
$this->addDefaultOrderType($this->indexType);
}
}