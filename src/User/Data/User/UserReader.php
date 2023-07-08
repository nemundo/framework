<?php
namespace Nemundo\User\Data\User;
class UserReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UserModel
*/
public $model;

public function __construct() {
$this->model = new UserModel();
parent::__construct();
}
/**
* @return \Nemundo\User\Reader\User\UserDataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return \Nemundo\User\Reader\User\UserDataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \Nemundo\User\Reader\User\UserDataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \Nemundo\User\Reader\User\UserDataRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}