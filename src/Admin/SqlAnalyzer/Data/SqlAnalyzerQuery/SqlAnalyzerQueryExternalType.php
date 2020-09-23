<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
class SqlAnalyzerQueryExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $sqlQuery;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $sqlResultRows;

/**
* @var \Nemundo\Model\Type\Number\DecimalNumberType
*/
public $sqlTime;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = SqlAnalyzerQueryModel::class;
$this->externalTableName = "admin_sql_analyzer_query";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->sqlQuery = new \Nemundo\Model\Type\Text\LargeTextType();
$this->sqlQuery->fieldName = "sql_query";
$this->sqlQuery->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sqlQuery->aliasFieldName = $this->sqlQuery->tableName . "_" . $this->sqlQuery->fieldName;
$this->sqlQuery->label = "";
$this->addType($this->sqlQuery);

$this->sqlResultRows = new \Nemundo\Model\Type\Number\NumberType();
$this->sqlResultRows->fieldName = "result_rows";
$this->sqlResultRows->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sqlResultRows->aliasFieldName = $this->sqlResultRows->tableName . "_" . $this->sqlResultRows->fieldName;
$this->sqlResultRows->label = "";
$this->addType($this->sqlResultRows);

$this->sqlTime = new \Nemundo\Model\Type\Number\DecimalNumberType();
$this->sqlTime->fieldName = "time";
$this->sqlTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sqlTime->aliasFieldName = $this->sqlTime->tableName . "_" . $this->sqlTime->fieldName;
$this->sqlTime->label = "";
$this->addType($this->sqlTime);

}
}