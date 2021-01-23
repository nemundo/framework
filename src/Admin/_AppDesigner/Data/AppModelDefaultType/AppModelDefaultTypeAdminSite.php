<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppModelDefaultTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppModelDefaultTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}