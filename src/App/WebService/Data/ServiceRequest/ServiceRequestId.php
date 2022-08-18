<?php
namespace Nemundo\App\WebService\Data\ServiceRequest;
use Nemundo\Model\Id\AbstractModelIdValue;
class ServiceRequestId extends AbstractModelIdValue {
/**
* @var ServiceRequestModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ServiceRequestModel();
}
}