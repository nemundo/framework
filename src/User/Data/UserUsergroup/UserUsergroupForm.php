<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroupForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var UserUsergroupModel
*/
public $model;

protected function loadContainer() {
$this->model = new UserUsergroupModel();
}
}