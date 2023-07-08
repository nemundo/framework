<?php
namespace Nemundo\App\Backup\Data\Backup;
use Nemundo\Model\Data\AbstractModelUpdate;
class BackupUpdate extends AbstractModelUpdate {
/**
* @var BackupModel
*/
public $model;

/**
* @var string
*/
public $applicationId;

/**
* @var string
*/
public $phpClass;

/**
* @var string
*/
public $filename;

/**
* @var bool
*/
public $setupStatus;

public function __construct() {
parent::__construct();
$this->model = new BackupModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->applicationId, $this->applicationId);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$this->typeValueList->setModelValue($this->model->filename, $this->filename);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
parent::update();
}
}