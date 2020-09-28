<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
class AppBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var AppModel
*/
protected $model;

/**
* @var bool
*/
public $active;

/**
* @var string
*/
public $appName;

/**
* @var string
*/
public $appPrefix;

/**
* @var string
*/
public $appNamespace;

public function __construct() {
parent::__construct();
$this->model = new AppModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->appName, $this->appName);
$this->typeValueList->setModelValue($this->model->appPrefix, $this->appPrefix);
$this->typeValueList->setModelValue($this->model->appNamespace, $this->appNamespace);
$id = parent::save();
return $id;
}
}