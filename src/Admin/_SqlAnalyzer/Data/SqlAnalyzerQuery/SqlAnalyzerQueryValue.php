<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
class SqlAnalyzerQueryValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SqlAnalyzerQueryModel();
}
}