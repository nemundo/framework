<?php
namespace Nemundo\App\Dataset\Data\Dataset;
class DatasetModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $dataset;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $licence;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $organisationId;

/**
* @var \Nemundo\App\Dataset\Data\Organisation\OrganisationExternalType
*/
public $organisation;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $categoryId;

/**
* @var \Nemundo\App\Dataset\Data\Category\CategoryExternalType
*/
public $category;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phpClass;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $licenceUrl;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $documentationUrl;

protected function loadModel() {
$this->tableName = "dataset_dataset";
$this->aliasTableName = "dataset_dataset";
$this->label = "Dataset";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "dataset_dataset";
$this->id->externalTableName = "dataset_dataset";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "dataset_dataset_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->dataset = new \Nemundo\Model\Type\Text\TextType($this);
$this->dataset->tableName = "dataset_dataset";
$this->dataset->externalTableName = "dataset_dataset";
$this->dataset->fieldName = "dataset";
$this->dataset->aliasFieldName = "dataset_dataset_dataset";
$this->dataset->label = "Dataset";
$this->dataset->allowNullValue = false;
$this->dataset->length = 255;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "dataset_dataset";
$this->url->externalTableName = "dataset_dataset";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "dataset_dataset_url";
$this->url->label = "Url";
$this->url->allowNullValue = false;
$this->url->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "dataset_dataset";
$this->description->externalTableName = "dataset_dataset";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "dataset_dataset_description";
$this->description->label = "Description";
$this->description->allowNullValue = false;

$this->licence = new \Nemundo\Model\Type\Text\TextType($this);
$this->licence->tableName = "dataset_dataset";
$this->licence->externalTableName = "dataset_dataset";
$this->licence->fieldName = "licence";
$this->licence->aliasFieldName = "dataset_dataset_licence";
$this->licence->label = "Licence";
$this->licence->allowNullValue = false;
$this->licence->length = 255;

$this->organisationId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->organisationId->tableName = "dataset_dataset";
$this->organisationId->fieldName = "organisation";
$this->organisationId->aliasFieldName = "dataset_dataset_organisation";
$this->organisationId->label = "Organisation";
$this->organisationId->allowNullValue = false;

$this->categoryId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->categoryId->tableName = "dataset_dataset";
$this->categoryId->fieldName = "category";
$this->categoryId->aliasFieldName = "dataset_dataset_category";
$this->categoryId->label = "Category";
$this->categoryId->allowNullValue = false;

$this->phpClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->phpClass->tableName = "dataset_dataset";
$this->phpClass->externalTableName = "dataset_dataset";
$this->phpClass->fieldName = "php_class";
$this->phpClass->aliasFieldName = "dataset_dataset_php_class";
$this->phpClass->label = "Php Class";
$this->phpClass->allowNullValue = false;
$this->phpClass->length = 255;

$this->licenceUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->licenceUrl->tableName = "dataset_dataset";
$this->licenceUrl->externalTableName = "dataset_dataset";
$this->licenceUrl->fieldName = "licence_url";
$this->licenceUrl->aliasFieldName = "dataset_dataset_licence_url";
$this->licenceUrl->label = "Licence Url";
$this->licenceUrl->allowNullValue = false;
$this->licenceUrl->length = 255;

$this->documentationUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->documentationUrl->tableName = "dataset_dataset";
$this->documentationUrl->externalTableName = "dataset_dataset";
$this->documentationUrl->fieldName = "documentation_url";
$this->documentationUrl->aliasFieldName = "dataset_dataset_documentation_url";
$this->documentationUrl->label = "Documentation Url";
$this->documentationUrl->allowNullValue = false;
$this->documentationUrl->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "php_class";
$index->addType($this->phpClass);

}
public function loadOrganisation() {
if ($this->organisation == null) {
$this->organisation = new \Nemundo\App\Dataset\Data\Organisation\OrganisationExternalType($this, "dataset_dataset_organisation");
$this->organisation->tableName = "dataset_dataset";
$this->organisation->fieldName = "organisation";
$this->organisation->aliasFieldName = "dataset_dataset_organisation";
$this->organisation->label = "Organisation";
}
return $this;
}
public function loadCategory() {
if ($this->category == null) {
$this->category = new \Nemundo\App\Dataset\Data\Category\CategoryExternalType($this, "dataset_dataset_category");
$this->category->tableName = "dataset_dataset";
$this->category->fieldName = "category";
$this->category->aliasFieldName = "dataset_dataset_category";
$this->category->label = "Category";
}
return $this;
}
}