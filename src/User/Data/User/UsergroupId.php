<?php
namespace Nemundo\User\Data\User;
use Nemundo\Model\Id\AbstractModelIdValue;
class UsergroupId extends AbstractModelIdValue {
/**
* @var UsergroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UsergroupModel();
}
}