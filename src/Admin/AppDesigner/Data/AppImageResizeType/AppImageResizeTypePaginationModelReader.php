<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
class AppImageResizeTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppImageResizeTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppImageResizeTypeModel();
}
/**
* @return AppImageResizeTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppImageResizeTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}