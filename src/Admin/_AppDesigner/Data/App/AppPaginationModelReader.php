<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
class AppPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModel();
}
/**
* @return AppRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}