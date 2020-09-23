<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
class AppModelPrimaryIndexTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppModelPrimaryIndexTypeModel
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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->indexType = $this->getModelValue($model->indexType);
}
}