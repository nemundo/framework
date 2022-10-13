<?php
namespace Nemundo\App\Dataset\Data\Organisation;
class OrganisationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $organisation;

protected function loadModel() {
$this->tableName = "dataset_organisation";
$this->aliasTableName = "dataset_organisation";
$this->label = "Organisation";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "dataset_organisation";
$this->id->externalTableName = "dataset_organisation";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "dataset_organisation_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->organisation = new \Nemundo\Model\Type\Text\TextType($this);
$this->organisation->tableName = "dataset_organisation";
$this->organisation->externalTableName = "dataset_organisation";
$this->organisation->fieldName = "organisation";
$this->organisation->aliasFieldName = "dataset_organisation_organisation";
$this->organisation->label = "Organisation";
$this->organisation->allowNullValue = false;
$this->organisation->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "organisation";
$index->addType($this->organisation);

}
}