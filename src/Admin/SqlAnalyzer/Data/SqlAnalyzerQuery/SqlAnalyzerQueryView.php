<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
use Nemundo\Model\View\ModelView;
class SqlAnalyzerQueryView extends ModelView {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new SqlAnalyzerQueryModel();
}
}