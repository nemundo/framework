<?php
namespace Nemundo\App\WebService\Data\Key;
class KeyPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var KeyModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KeyModel();
}
/**
* @return KeyRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new KeyRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}