<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
class AppAutoNumberTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppAutoNumberTypeModel();
}
/**
* @return AppAutoNumberTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppAutoNumberTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}