<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppAutoNumberTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppAutoNumberTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}