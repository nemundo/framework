<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppModelAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppModelModel
*/
public $model;

protected function loadSite() {
$this->model = new AppModelModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}