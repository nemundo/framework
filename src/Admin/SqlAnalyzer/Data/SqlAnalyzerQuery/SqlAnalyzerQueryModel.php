<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
class SqlAnalyzerQueryModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "admin_sql_analyzer_query";
$this->aliasTableName = "admin_sql_analyzer_query";
$this->label = "";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "admin_sql_analyzer_query";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "admin_sql_analyzer_query_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->sqlQuery = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->sqlQuery->tableName = "admin_sql_analyzer_query";
$this->sqlQuery->fieldName = "sql_query";
$this->sqlQuery->aliasFieldName = "admin_sql_analyzer_query_sql_query";
$this->sqlQuery->label = "";
$this->sqlQuery->allowNullValue = false;

$this->sqlResultRows = new \Nemundo\Model\Type\Number\NumberType($this);
$this->sqlResultRows->tableName = "admin_sql_analyzer_query";
$this->sqlResultRows->fieldName = "result_rows";
$this->sqlResultRows->aliasFieldName = "admin_sql_analyzer_query_result_rows";
$this->sqlResultRows->label = "";
$this->sqlResultRows->allowNullValue = false;

$this->sqlTime = new \Nemundo\Model\Type\Number\DecimalNumberType($this);
$this->sqlTime->tableName = "admin_sql_analyzer_query";
$this->sqlTime->fieldName = "time";
$this->sqlTime->aliasFieldName = "admin_sql_analyzer_query_time";
$this->sqlTime->label = "";
$this->sqlTime->allowNullValue = false;

}
}