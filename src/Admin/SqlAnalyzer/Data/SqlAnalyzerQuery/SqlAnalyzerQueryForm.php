<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
class SqlAnalyzerQueryForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

protected function loadContainer() {
$this->model = new SqlAnalyzerQueryModel();
}
}