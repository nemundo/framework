<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppModelFieldAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppModelFieldModel
*/
public $model;

protected function loadSite() {
$this->model = new AppModelFieldModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}