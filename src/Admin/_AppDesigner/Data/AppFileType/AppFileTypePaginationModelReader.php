<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
class AppFileTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppFileTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppFileTypeModel();
}
/**
* @return AppFileTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppFileTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}