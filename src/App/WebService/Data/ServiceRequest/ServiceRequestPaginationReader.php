<?php
namespace Nemundo\App\WebService\Data\ServiceRequest;
class ServiceRequestPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ServiceRequestModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ServiceRequestModel();
}
/**
* @return ServiceRequestRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ServiceRequestRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}