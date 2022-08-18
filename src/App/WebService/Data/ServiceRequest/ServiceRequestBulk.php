<?php
namespace Nemundo\App\WebService\Data\ServiceRequest;
class ServiceRequestBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ServiceRequestModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->uniqueName, $this->uniqueName);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$this->typeValueList->setModelValue($this->model->applicationId, $this->applicationId);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
$id = parent::save();
return $id;
}
}