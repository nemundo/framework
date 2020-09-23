<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
class AppTextTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppTextTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppTextTypeModel();
}
/**
* @return AppTextTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppTextTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}