<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
class SqlAnalyzerValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SqlAnalyzerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SqlAnalyzerModel();
}
}