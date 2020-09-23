<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppTemplateModelAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppTemplateModelModel
*/
public $model;

protected function loadSite() {
$this->model = new AppTemplateModelModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}