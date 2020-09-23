<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
class AppRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppModel
*/
public $model;

/**
* @var string
*/
public $id;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->active = $this->getModelValue($model->active);
$this->appName = $this->getModelValue($model->appName);
$this->appPrefix = $this->getModelValue($model->appPrefix);
$this->appNamespace = $this->getModelValue($model->appNamespace);
}
}