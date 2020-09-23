<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
class AppAutoNumberTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppAutoNumberTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $appFieldId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldRow
*/
public $appField;

/**
* @var int
*/
public $startNumber;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->appFieldId = $this->getModelValue($model->appFieldId);
if ($model->appField !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelFieldAppModelFieldappFieldRow($model->appField);
}
$this->startNumber = $this->getModelValue($model->startNumber);
}
private function loadNemundoAdminAppDesignerDataAppModelFieldAppModelFieldappFieldRow($model) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldRow($this->row, $model);
}
}