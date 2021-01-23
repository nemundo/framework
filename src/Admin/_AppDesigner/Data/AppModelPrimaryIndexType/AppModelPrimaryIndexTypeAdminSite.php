<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppModelPrimaryIndexTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppModelPrimaryIndexTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppModelPrimaryIndexTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}