<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
class SqlAnalyzerExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = SqlAnalyzerModel::class;
$this->externalTableName = "admin_sql_analyzer";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->sqlQueryId = new \Nemundo\Model\Type\Id\IdType();
$this->sqlQueryId->fieldName = "sql_query";
$this->sqlQueryId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sqlQueryId->aliasFieldName = $this->sqlQueryId->tableName ."_".$this->sqlQueryId->fieldName;
$this->sqlQueryId->label = "";
$this->addType($this->sqlQueryId);

$this->sqlTableName = new \Nemundo\Model\Type\Text\TextType();
$this->sqlTableName->fieldName = "table_name";
$this->sqlTableName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sqlTableName->aliasFieldName = $this->sqlTableName->tableName . "_" . $this->sqlTableName->fieldName;
$this->sqlTableName->label = "";
$this->addType($this->sqlTableName);

$this->sqlSelectType = new \Nemundo\Model\Type\Text\TextType();
$this->sqlSelectType->fieldName = "select_type";
$this->sqlSelectType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sqlSelectType->aliasFieldName = $this->sqlSelectType->tableName . "_" . $this->sqlSelectType->fieldName;
$this->sqlSelectType->label = "";
$this->addType($this->sqlSelectType);

$this->sqlKey = new \Nemundo\Model\Type\Text\TextType();
$this->sqlKey->fieldName = "key";
$this->sqlKey->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sqlKey->aliasFieldName = $this->sqlKey->tableName . "_" . $this->sqlKey->fieldName;
$this->sqlKey->label = "";
$this->addType($this->sqlKey);

$this->sqlRows = new \Nemundo\Model\Type\Number\NumberType();
$this->sqlRows->fieldName = "rows";
$this->sqlRows->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sqlRows->aliasFieldName = $this->sqlRows->tableName . "_" . $this->sqlRows->fieldName;
$this->sqlRows->label = "";
$this->addType($this->sqlRows);

$this->sqlExtra = new \Nemundo\Model\Type\Text\TextType();
$this->sqlExtra->fieldName = "extra";
$this->sqlExtra->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sqlExtra->aliasFieldName = $this->sqlExtra->tableName . "_" . $this->sqlExtra->fieldName;
$this->sqlExtra->label = "";
$this->addType($this->sqlExtra);

}
public function loadSqlQuery() {
if ($this->sqlQuery == null) {
$this->sqlQuery = new \Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery\SqlAnalyzerQueryExternalType(null, $this->parentFieldName . "_sql_query");
$this->sqlQuery->fieldName = "sql_query";
$this->sqlQuery->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sqlQuery->aliasFieldName = $this->sqlQuery->tableName ."_".$this->sqlQuery->fieldName;
$this->sqlQuery->label = "";
$this->addType($this->sqlQuery);
}
return $this;
}
}