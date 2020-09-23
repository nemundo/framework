<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
use Nemundo\Model\Form\ModelFormUpdate;
class SqlAnalyzerQueryFormUpdate extends ModelFormUpdate {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

protected function loadContainer() {
$this->model = new SqlAnalyzerQueryModel();
}
}