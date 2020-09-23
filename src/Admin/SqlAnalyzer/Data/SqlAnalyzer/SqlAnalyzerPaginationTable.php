<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
class SqlAnalyzerPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var SqlAnalyzerModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new SqlAnalyzerModel();
}
}