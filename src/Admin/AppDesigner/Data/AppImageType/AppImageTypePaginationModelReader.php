<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppImageTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppImageTypeModel();
}
/**
* @return AppImageTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppImageTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}