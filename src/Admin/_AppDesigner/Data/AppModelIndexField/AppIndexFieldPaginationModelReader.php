<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
class AppIndexFieldPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppModelIndexFieldModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexFieldModel();
}
/**
* @return AppModelIndexFieldRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppModelIndexFieldRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}