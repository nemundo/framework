<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
class SqlAnalyzerCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SqlAnalyzerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SqlAnalyzerModel();
}
}