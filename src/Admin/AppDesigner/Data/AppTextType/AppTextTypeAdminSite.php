<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppTextTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppTextTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppTextTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}