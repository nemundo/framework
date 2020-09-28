<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
class SqlAnalyzerQueryPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new SqlAnalyzerQueryModel();
}
}