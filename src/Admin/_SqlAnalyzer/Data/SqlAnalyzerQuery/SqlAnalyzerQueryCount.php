<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
class SqlAnalyzerQueryCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SqlAnalyzerQueryModel();
}
}