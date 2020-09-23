<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
class SqlAnalyzerQueryAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  SqlAnalyzerQueryModel();
}
}