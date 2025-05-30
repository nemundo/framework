<?php
namespace Nemundo\User\Data\User;
class UserPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var UserModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserModel();
}
/**
* @return \Nemundo\User\Reader\User\UserDataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \Nemundo\User\Reader\User\UserDataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}