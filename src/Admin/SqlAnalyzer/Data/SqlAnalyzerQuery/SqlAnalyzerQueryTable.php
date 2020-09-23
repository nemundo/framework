<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class SqlAnalyzerQueryTable extends BootstrapModelTable {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

protected function loadContainer() {
$this->model = new SqlAnalyzerQueryModel();
}
}