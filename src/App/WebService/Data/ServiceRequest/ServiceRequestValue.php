<?php
namespace Nemundo\App\WebService\Data\ServiceRequest;
class ServiceRequestValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ServiceRequestModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ServiceRequestModel();
}
}