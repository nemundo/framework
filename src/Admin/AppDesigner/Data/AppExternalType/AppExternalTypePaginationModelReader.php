<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
class AppExternalTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppExternalTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppExternalTypeModel();
}
/**
* @return AppExternalTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppExternalTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}