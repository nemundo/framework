<?php
namespace Nemundo\App\Backup\Data\Backup;
class Backup extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var BackupModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->applicationId, $this->applicationId);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$this->typeValueList->setModelValue($this->model->filename, $this->filename);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
$id = parent::save();
return $id;
}
}