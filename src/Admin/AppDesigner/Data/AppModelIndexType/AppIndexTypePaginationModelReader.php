<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
class AppIndexTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppModelIndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexTypeModel();
}
/**
* @return AppModelIndexTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppModelIndexTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}