<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
class AppFieldTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppModelFieldTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldTypeModel();
}
/**
* @return AppModelFieldTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppModelFieldTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}