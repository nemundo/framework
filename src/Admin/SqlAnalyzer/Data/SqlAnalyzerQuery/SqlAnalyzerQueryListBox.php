<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
class SqlAnalyzerQueryListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new SqlAnalyzerQueryModel();
$this->label = $this->model->label;
}
}