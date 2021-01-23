<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppExternalTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppExternalTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppExternalTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}