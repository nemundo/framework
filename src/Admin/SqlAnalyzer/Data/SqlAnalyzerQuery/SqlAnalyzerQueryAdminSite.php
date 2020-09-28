<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
use Nemundo\Model\Site\AbstractModelAdminSite;
class SqlAnalyzerQueryAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

protected function loadSite() {
$this->model = new SqlAnalyzerQueryModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}