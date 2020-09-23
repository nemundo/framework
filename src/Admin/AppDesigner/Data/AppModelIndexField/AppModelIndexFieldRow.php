<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
class AppModelIndexFieldRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppModelIndexFieldModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $appIndexId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexRow
*/
public $appIndex;

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
public $itemOrder;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->appIndexId = $this->getModelValue($model->appIndexId);
if ($model->appIndex !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelIndexAppModelIndexappIndexRow($model->appIndex);
}
$this->appFieldId = $this->getModelValue($model->appFieldId);
if ($model->appField !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelFieldAppModelFieldappFieldRow($model->appField);
}
$this->itemOrder = $this->getModelValue($model->itemOrder);
}
private function loadNemundoAdminAppDesignerDataAppModelIndexAppModelIndexappIndexRow($model) {
$this->appIndex = new \Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexRow($this->row, $model);
}
private function loadNemundoAdminAppDesignerDataAppModelFieldAppModelFieldappFieldRow($model) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldRow($this->row, $model);
}
}