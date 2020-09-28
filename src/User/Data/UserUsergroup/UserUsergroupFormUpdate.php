<?php
namespace Nemundo\User\Data\UserUsergroup;
use Nemundo\Model\Form\ModelFormUpdate;
class UserUsergroupFormUpdate extends ModelFormUpdate {
/**
* @var UserUsergroupModel
*/
public $model;

protected function loadContainer() {
$this->model = new UserUsergroupModel();
}
}