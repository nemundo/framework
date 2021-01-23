<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppModelIndexTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppModelIndexTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppModelIndexTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}