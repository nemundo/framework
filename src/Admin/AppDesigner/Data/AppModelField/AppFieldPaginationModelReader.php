<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
class AppFieldPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppModelFieldModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldModel();
}
/**
* @return AppModelFieldRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppModelFieldRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}