<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
class SqlAnalyzerForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var SqlAnalyzerModel
*/
public $model;

protected function loadContainer() {
$this->model = new SqlAnalyzerModel();
}
}