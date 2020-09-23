<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroupPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var UserUsergroupModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new UserUsergroupModel();
}
}