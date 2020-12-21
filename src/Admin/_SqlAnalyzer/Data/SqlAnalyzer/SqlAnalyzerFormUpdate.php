<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
use Nemundo\Model\Form\ModelFormUpdate;
class SqlAnalyzerFormUpdate extends ModelFormUpdate {
/**
* @var SqlAnalyzerModel
*/
public $model;

protected function loadContainer() {
$this->model = new SqlAnalyzerModel();
}
}