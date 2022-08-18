<?php
namespace Nemundo\App\WebService\Data\ServiceRequest;
class ServiceRequestCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ServiceRequestModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ServiceRequestModel();
}
}