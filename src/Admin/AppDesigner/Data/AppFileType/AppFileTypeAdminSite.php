<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppFileTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppFileTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppFileTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}