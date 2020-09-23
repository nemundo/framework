<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroupAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var UserUsergroupModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  UserUsergroupModel();
}
}