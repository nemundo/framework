<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppPhpClassTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppPhpClassTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppPhpClassTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}