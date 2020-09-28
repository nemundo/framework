<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
class SqlAnalyzerModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $sqlQueryId;

/**
* @var \Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery\SqlAnalyzerQueryExternalType
*/
public $sqlQuery;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $sqlTableName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $sqlSelectType;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $sqlKey;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $sqlRows;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $sqlExtra;

protected function loadModel() {
$this->tableName = "admin_sql_analyzer";
$this->aliasTableName = "admin_sql_analyzer";
$this->label = "";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "admin_sql_analyzer";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "admin_sql_analyzer_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->sqlQueryId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->sqlQueryId->tableName = "admin_sql_analyzer";
$this->sqlQueryId->fieldName = "sql_query";
$this->sqlQueryId->aliasFieldName = "admin_sql_analyzer_sql_query";
$this->sqlQueryId->label = "";
$this->sqlQueryId->allowNullValue = false;

$this->sqlTableName = new \Nemundo\Model\Type\Text\TextType($this);
$this->sqlTableName->tableName = "admin_sql_analyzer";
$this->sqlTableName->fieldName = "table_name";
$this->sqlTableName->aliasFieldName = "admin_sql_analyzer_table_name";
$this->sqlTableName->label = "";
$this->sqlTableName->allowNullValue = false;
$this->sqlTableName->length = 255;

$this->sqlSelectType = new \Nemundo\Model\Type\Text\TextType($this);
$this->sqlSelectType->tableName = "admin_sql_analyzer";
$this->sqlSelectType->fieldName = "select_type";
$this->sqlSelectType->aliasFieldName = "admin_sql_analyzer_select_type";
$this->sqlSelectType->label = "";
$this->sqlSelectType->allowNullValue = false;
$this->sqlSelectType->length = 255;

$this->sqlKey = new \Nemundo\Model\Type\Text\TextType($this);
$this->sqlKey->tableName = "admin_sql_analyzer";
$this->sqlKey->fieldName = "key";
$this->sqlKey->aliasFieldName = "admin_sql_analyzer_key";
$this->sqlKey->label = "";
$this->sqlKey->allowNullValue = false;
$this->sqlKey->length = 255;

$this->sqlRows = new \Nemundo\Model\Type\Number\NumberType($this);
$this->sqlRows->tableName = "admin_sql_analyzer";
$this->sqlRows->fieldName = "rows";
$this->sqlRows->aliasFieldName = "admin_sql_analyzer_rows";
$this->sqlRows->label = "";
$this->sqlRows->allowNullValue = false;

$this->sqlExtra = new \Nemundo\Model\Type\Text\TextType($this);
$this->sqlExtra->tableName = "admin_sql_analyzer";
$this->sqlExtra->fieldName = "extra";
$this->sqlExtra->aliasFieldName = "admin_sql_analyzer_extra";
$this->sqlExtra->label = "";
$this->sqlExtra->allowNullValue = false;
$this->sqlExtra->length = 255;

}
public function loadSqlQuery() {
if ($this->sqlQuery == null) {
$this->sqlQuery = new \Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery\SqlAnalyzerQueryExternalType($this, "admin_sql_analyzer_sql_query");
$this->sqlQuery->tableName = "admin_sql_analyzer";
$this->sqlQuery->fieldName = "sql_query";
$this->sqlQuery->aliasFieldName = "admin_sql_analyzer_sql_query";
$this->sqlQuery->label = "";
}
return $this;
}
}