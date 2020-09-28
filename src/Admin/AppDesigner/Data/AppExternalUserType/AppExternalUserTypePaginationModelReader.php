<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
class AppExternalUserTypePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppExternalUserTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppExternalUserTypeModel();
}
/**
* @return AppExternalUserTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppExternalUserTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}