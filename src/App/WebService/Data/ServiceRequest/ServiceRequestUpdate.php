<?php
namespace Nemundo\App\WebService\Data\ServiceRequest;
use Nemundo\Model\Data\AbstractModelUpdate;
class ServiceRequestUpdate extends AbstractModelUpdate {
/**
* @var ServiceRequestModel
*/
public $model;

/**
* @var string
*/
public $uniqueName;

/**
* @var string
*/
public $phpClass;

/**
* @var string
*/
public $applicationId;

/**
* @var bool
*/
public $setupStatus;

public function __construct() {
parent::__construct();
$this->model = new ServiceRequestModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->uniqueName, $this->uniqueName);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$this->typeValueList->setModelValue($this->model->applicationId, $this->applicationId);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
parent::update();
}
}