<?php
namespace Nemundo\App\WebService\Data\ServiceRequest;
class ServiceRequestRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ServiceRequestModel
*/
public $model;

/**
* @var string
*/
public $id;

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
* @var \Nemundo\App\Application\Row\ApplicationCustomRow
*/
public $application;

/**
* @var bool
*/
public $setupStatus;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->uniqueName = $this->getModelValue($model->uniqueName);
$this->phpClass = $this->getModelValue($model->phpClass);
$this->applicationId = $this->getModelValue($model->applicationId);
if ($model->application !== null) {
$this->loadNemundoAppApplicationDataApplicationApplicationapplicationRow($model->application);
}
$this->setupStatus = boolval($this->getModelValue($model->setupStatus));
}
private function loadNemundoAppApplicationDataApplicationApplicationapplicationRow($model) {
$this->application = new \Nemundo\App\Application\Row\ApplicationCustomRow($this->row, $model);
}
}