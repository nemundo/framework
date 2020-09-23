<?php
namespace Nemundo\User\Data\UserUsergroup;
use Nemundo\Model\View\ModelView;
class UserUsergroupView extends ModelView {
/**
* @var UserUsergroupModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new UserUsergroupModel();
}
}