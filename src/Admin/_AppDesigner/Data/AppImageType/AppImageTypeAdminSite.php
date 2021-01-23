<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppImageTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppImageTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppImageTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}