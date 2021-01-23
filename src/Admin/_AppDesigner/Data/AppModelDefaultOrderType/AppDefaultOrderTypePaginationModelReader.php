<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
class AppDefaultOrderTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppModelDefaultOrderTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelDefaultOrderTypeModel();
}
/**
* @return AppModelDefaultOrderTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppModelDefaultOrderTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}