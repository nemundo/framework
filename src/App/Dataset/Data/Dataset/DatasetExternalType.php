<?php
namespace Nemundo\App\Dataset\Data\Dataset;
class DatasetExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $organisationId;

/**
* @var \Nemundo\App\Dataset\Data\Organisation\OrganisationExternalType
*/
public $organisation;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = DatasetModel::class;
$this->externalTableName = "dataset_dataset";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->dataset = new \Nemundo\Model\Type\Text\TextType();
$this->dataset->fieldName = "dataset";
$this->dataset->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dataset->externalTableName = $this->externalTableName;
$this->dataset->aliasFieldName = $this->dataset->tableName . "_" . $this->dataset->fieldName;
$this->dataset->label = "Dataset";
$this->addType($this->dataset);

$this->url = new \Nemundo\Model\Type\Text\TextType();
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->externalTableName = $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName . "_" . $this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->externalTableName = $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Description";
$this->addType($this->description);

$this->licence = new \Nemundo\Model\Type\Text\TextType();
$this->licence->fieldName = "licence";
$this->licence->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->licence->externalTableName = $this->externalTableName;
$this->licence->aliasFieldName = $this->licence->tableName . "_" . $this->licence->fieldName;
$this->licence->label = "Licence";
$this->addType($this->licence);

$this->organisationId = new \Nemundo\Model\Type\Id\IdType();
$this->organisationId->fieldName = "organisation";
$this->organisationId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->organisationId->aliasFieldName = $this->organisationId->tableName ."_".$this->organisationId->fieldName;
$this->organisationId->label = "Organisation";
$this->addType($this->organisationId);

$this->categoryId = new \Nemundo\Model\Type\Id\IdType();
$this->categoryId->fieldName = "category";
$this->categoryId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->categoryId->aliasFieldName = $this->categoryId->tableName ."_".$this->categoryId->fieldName;
$this->categoryId->label = "Category";
$this->addType($this->categoryId);

$this->phpClass = new \Nemundo\Model\Type\Text\TextType();
$this->phpClass->fieldName = "php_class";
$this->phpClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->phpClass->externalTableName = $this->externalTableName;
$this->phpClass->aliasFieldName = $this->phpClass->tableName . "_" . $this->phpClass->fieldName;
$this->phpClass->label = "Php Class";
$this->addType($this->phpClass);

}
public function loadOrganisation() {
if ($this->organisation == null) {
$this->organisation = new \Nemundo\App\Dataset\Data\Organisation\OrganisationExternalType(null, $this->parentFieldName . "_organisation");
$this->organisation->fieldName = "organisation";
$this->organisation->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->organisation->aliasFieldName = $this->organisation->tableName ."_".$this->organisation->fieldName;
$this->organisation->label = "Organisation";
$this->addType($this->organisation);
}
return $this;
}
public function loadCategory() {
if ($this->category == null) {
$this->category = new \Nemundo\App\Dataset\Data\Category\CategoryExternalType(null, $this->parentFieldName . "_category");
$this->category->fieldName = "category";
$this->category->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->category->aliasFieldName = $this->category->tableName ."_".$this->category->fieldName;
$this->category->label = "Category";
$this->addType($this->category);
}
return $this;
}
}