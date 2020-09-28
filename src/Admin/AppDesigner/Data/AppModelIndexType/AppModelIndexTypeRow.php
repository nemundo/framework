<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
class AppModelIndexTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppModelIndexTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $indexType;

/**
* @var string
*/
public $indexTypeClassName;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->indexType = $this->getModelValue($model->indexType);
$this->indexTypeClassName = $this->getModelValue($model->indexTypeClassName);
}
}