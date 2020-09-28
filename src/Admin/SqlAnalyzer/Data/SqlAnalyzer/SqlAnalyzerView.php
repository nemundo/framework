<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
use Nemundo\Model\View\ModelView;
class SqlAnalyzerView extends ModelView {
/**
* @var SqlAnalyzerModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new SqlAnalyzerModel();
}
}