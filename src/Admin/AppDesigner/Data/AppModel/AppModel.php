<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppModel extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AppModelModel
*/
protected $model;

/**
* @var bool
*/
public $active;

/**
* @var bool
*/
public $editable;

/**
* @var string
*/
public $appId;

/**
* @var string
*/
public $templateModelId;

/**
* @var string
*/
public $modelLabel;

/**
* @var string
*/
public $modelTableName;

/**
* @var string
*/
public $modelPrimaryIndexId;

/**
* @var string
*/
public $modelClassName;

/**
* @var string
*/
public $modelNamespace;

/**
* @var bool
*/
public $modelCreateAdminOrm;

/**
* @var string
*/
public $rowClassName;

public function __construct() {
parent::__construct();
$this->model = new AppModelModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->editable, $this->editable);
$this->typeValueList->setModelValue($this->model->appId, $this->appId);
$this->typeValueList->setModelValue($this->model->templateModelId, $this->templateModelId);
$this->typeValueList->setModelValue($this->model->modelLabel, $this->modelLabel);
$this->typeValueList->setModelValue($this->model->modelTableName, $this->modelTableName);
$this->typeValueList->setModelValue($this->model->modelPrimaryIndexId, $this->modelPrimaryIndexId);
$this->typeValueList->setModelValue($this->model->modelClassName, $this->modelClassName);
$this->typeValueList->setModelValue($this->model->modelNamespace, $this->modelNamespace);
$this->typeValueList->setModelValue($this->model->modelCreateAdminOrm, $this->modelCreateAdminOrm);
$this->typeValueList->setModelValue($this->model->rowClassName, $this->rowClassName);
$id = parent::save();
return $id;
}
}