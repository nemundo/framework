<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
class AppIndexPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppModelIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexModel();
}
/**
* @return AppModelIndexRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppModelIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}