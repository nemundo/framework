<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
class AppPrefixAutoNumberTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppPrefixAutoNumberTypeModel();
}
/**
* @return AppPrefixAutoNumberTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppPrefixAutoNumberTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}