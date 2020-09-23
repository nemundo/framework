<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppExternalUserTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppExternalUserTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppExternalUserTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}