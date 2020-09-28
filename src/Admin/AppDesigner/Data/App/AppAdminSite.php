<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppModel
*/
public $model;

protected function loadSite() {
$this->model = new AppModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}