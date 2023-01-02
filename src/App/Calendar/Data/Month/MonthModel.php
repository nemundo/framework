<?php
namespace Nemundo\App\Calendar\Data\Month;
class MonthModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $month;

protected function loadModel() {
$this->tableName = "calendar_month";
$this->aliasTableName = "calendar_month";
$this->label = "Month";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "calendar_month";
$this->id->externalTableName = "calendar_month";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "calendar_month_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->month = new \Nemundo\Model\Type\Text\TextType($this);
$this->month->tableName = "calendar_month";
$this->month->externalTableName = "calendar_month";
$this->month->fieldName = "month";
$this->month->aliasFieldName = "calendar_month_month";
$this->month->label = "Month";
$this->month->allowNullValue = false;
$this->month->length = 255;

}
}