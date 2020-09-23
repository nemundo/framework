<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
class AppPrimaryIndexTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppModelPrimaryIndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelPrimaryIndexTypeModel();
}
/**
* @return AppModelPrimaryIndexTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppModelPrimaryIndexTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}