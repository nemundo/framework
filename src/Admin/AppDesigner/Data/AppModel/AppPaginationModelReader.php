<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelModel();
}
/**
* @return AppModelRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppModelRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}