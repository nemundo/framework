<?php
namespace Nemundo\User\Data\User;
class UsergroupDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var UsergroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UsergroupModel();
}
}