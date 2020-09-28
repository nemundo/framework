<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
class AppDefaultTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelDefaultTypeModel();
}
/**
* @return AppModelDefaultTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppModelDefaultTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}