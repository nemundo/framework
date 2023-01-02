<?php
namespace Nemundo\App\Calendar\Data\Month;
class MonthExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $month;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = MonthModel::class;
$this->externalTableName = "calendar_month";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->month = new \Nemundo\Model\Type\Text\TextType();
$this->month->fieldName = "month";
$this->month->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->month->externalTableName = $this->externalTableName;
$this->month->aliasFieldName = $this->month->tableName . "_" . $this->month->fieldName;
$this->month->label = "Month";
$this->addType($this->month);

}
}