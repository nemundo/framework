<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppModelIndexAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppModelIndexModel
*/
public $model;

protected function loadSite() {
$this->model = new AppModelIndexModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}