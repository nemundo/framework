<?php
namespace Nemundo\User\Data\UserUsergroup;
use Nemundo\Model\Site\AbstractModelAdminSite;
class UserUsergroupAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var UserUsergroupModel
*/
public $model;

protected function loadSite() {
$this->model = new UserUsergroupModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}