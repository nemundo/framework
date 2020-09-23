<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
class SqlAnalyzerQueryDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SqlAnalyzerQueryModel();
}
}