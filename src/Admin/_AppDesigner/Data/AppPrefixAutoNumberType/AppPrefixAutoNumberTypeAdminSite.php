<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppPrefixAutoNumberTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppPrefixAutoNumberTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}