<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
use Nemundo\Model\Site\AbstractModelAdminSite;
class SqlAnalyzerAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var SqlAnalyzerModel
*/
public $model;

protected function loadSite() {
$this->model = new SqlAnalyzerModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}