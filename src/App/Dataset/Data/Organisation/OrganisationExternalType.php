<?php
namespace Nemundo\App\Dataset\Data\Organisation;
class OrganisationExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $organisation;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = OrganisationModel::class;
$this->externalTableName = "dataset_organisation";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->organisation = new \Nemundo\Model\Type\Text\TextType();
$this->organisation->fieldName = "organisation";
$this->organisation->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->organisation->externalTableName = $this->externalTableName;
$this->organisation->aliasFieldName = $this->organisation->tableName . "_" . $this->organisation->fieldName;
$this->organisation->label = "Organisation";
$this->addType($this->organisation);

}
}