<?php
namespace Nemundo\App\Dataset\Data\Category;
class CategoryModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $category;

protected function loadModel() {
$this->tableName = "dataset_category";
$this->aliasTableName = "dataset_category";
$this->label = "Category";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "dataset_category";
$this->id->externalTableName = "dataset_category";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "dataset_category_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->category = new \Nemundo\Model\Type\Text\TextType($this);
$this->category->tableName = "dataset_category";
$this->category->externalTableName = "dataset_category";
$this->category->fieldName = "category";
$this->category->aliasFieldName = "dataset_category_category";
$this->category->label = "Category";
$this->category->allowNullValue = false;
$this->category->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "category";
$index->addType($this->category);

}
}