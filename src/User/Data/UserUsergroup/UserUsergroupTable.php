<?php
namespace Nemundo\User\Data\UserUsergroup;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class UserUsergroupTable extends BootstrapModelTable {
/**
* @var UserUsergroupModel
*/
public $model;

protected function loadContainer() {
$this->model = new UserUsergroupModel();
}
}