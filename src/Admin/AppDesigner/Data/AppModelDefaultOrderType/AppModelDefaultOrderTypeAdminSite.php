<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppModelDefaultOrderTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppModelDefaultOrderTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppModelDefaultOrderTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}