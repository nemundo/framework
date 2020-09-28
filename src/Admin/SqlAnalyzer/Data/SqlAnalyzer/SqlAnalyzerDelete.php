<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
class SqlAnalyzerDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SqlAnalyzerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SqlAnalyzerModel();
}
}