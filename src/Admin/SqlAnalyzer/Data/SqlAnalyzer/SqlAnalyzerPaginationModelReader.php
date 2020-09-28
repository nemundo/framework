<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
class SqlAnalyzerPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var SqlAnalyzerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SqlAnalyzerModel();
}
/**
* @return SqlAnalyzerRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SqlAnalyzerRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}