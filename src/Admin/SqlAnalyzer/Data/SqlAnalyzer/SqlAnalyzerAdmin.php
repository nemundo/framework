<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
class SqlAnalyzerAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var SqlAnalyzerModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  SqlAnalyzerModel();
}
}