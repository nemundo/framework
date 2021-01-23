<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AppImageResizeTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AppImageResizeTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new AppImageResizeTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}