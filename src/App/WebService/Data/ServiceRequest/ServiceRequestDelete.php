<?php
namespace Nemundo\App\WebService\Data\ServiceRequest;
class ServiceRequestDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ServiceRequestModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ServiceRequestModel();
}
}