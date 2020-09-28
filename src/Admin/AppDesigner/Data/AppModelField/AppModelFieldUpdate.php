<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppModelFieldUpdate extends AbstractModelUpdate {
/**
* @var AppModelFieldModel
*/
public $model;

/**
* @var string
*/
public $appModelId;

/**
* @var string
*/
public $appFieldTypeId;

/**
* @var string
*/
public $appFieldLabel;

/**
* @var string
*/
public $appFieldVariableName;

/**
* @var string
*/
public $appFieldName;

/**
* @var bool
*/
public $appAllowNullValue;

/**
* @var bool
*/
public $appFieldValidation;

/**
* @var string
*/
public $appFieldDefaultValue;

/**
* @var bool
*/
public $formVisible;

/**
* @var bool
*/
public $tableVisible;

/**
* @var bool
*/
public $viewVisible;

/**
* @var int
*/
public $itemOrder;

/**
* @var bool
*/
public $active;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->appModelId, $this->appModelId);
$this->typeValueList->setModelValue($this->model->appFieldTypeId, $this->appFieldTypeId);
$this->typeValueList->setModelValue($this->model->appFieldLabel, $this->appFieldLabel);
$this->typeValueList->setModelValue($this->model->appFieldVariableName, $this->appFieldVariableName);
$this->typeValueList->setModelValue($this->model->appFieldName, $this->appFieldName);
$this->typeValueList->setModelValue($this->model->appAllowNullValue, $this->appAllowNullValue);
$this->typeValueList->setModelValue($this->model->appFieldValidation, $this->appFieldValidation);
$this->typeValueList->setModelValue($this->model->appFieldDefaultValue, $this->appFieldDefaultValue);
$this->typeValueList->setModelValue($this->model->formVisible, $this->formVisible);
$this->typeValueList->setModelValue($this->model->tableVisible, $this->tableVisible);
$this->typeValueList->setModelValue($this->model->viewVisible, $this->viewVisible);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
$this->typeValueList->setModelValue($this->model->active, $this->active);
parent::update();
}
}