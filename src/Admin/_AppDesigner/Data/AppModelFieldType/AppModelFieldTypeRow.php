<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
class AppModelFieldTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppModelFieldTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $fieldType;

/**
* @var string
*/
public $fieldClassName;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->fieldType = $this->getModelValue($model->fieldType);
$this->fieldClassName = $this->getModelValue($model->fieldClassName);
}
}