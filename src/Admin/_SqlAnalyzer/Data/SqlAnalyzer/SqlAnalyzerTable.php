<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class SqlAnalyzerTable extends BootstrapModelTable {
/**
* @var SqlAnalyzerModel
*/
public $model;

protected function loadContainer() {
$this->model = new SqlAnalyzerModel();
}
}