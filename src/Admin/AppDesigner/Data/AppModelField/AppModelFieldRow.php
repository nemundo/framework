<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
class AppModelFieldRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppModelFieldModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $appModelId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelRow
*/
public $appModel;

/**
* @var string
*/
public $appFieldTypeId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelFieldType\AppModelFieldTypeRow
*/
public $appFieldType;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->appModelId = $this->getModelValue($model->appModelId);
if ($model->appModel !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelAppModelappModelRow($model->appModel);
}
$this->appFieldTypeId = $this->getModelValue($model->appFieldTypeId);
if ($model->appFieldType !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelFieldTypeAppModelFieldTypeappFieldTypeRow($model->appFieldType);
}
$this->appFieldLabel = $this->getModelValue($model->appFieldLabel);
$this->appFieldVariableName = $this->getModelValue($model->appFieldVariableName);
$this->appFieldName = $this->getModelValue($model->appFieldName);
$this->appAllowNullValue = $this->getModelValue($model->appAllowNullValue);
$this->appFieldValidation = $this->getModelValue($model->appFieldValidation);
$this->appFieldDefaultValue = $this->getModelValue($model->appFieldDefaultValue);
$this->formVisible = $this->getModelValue($model->formVisible);
$this->tableVisible = $this->getModelValue($model->tableVisible);
$this->viewVisible = $this->getModelValue($model->viewVisible);
$this->itemOrder = $this->getModelValue($model->itemOrder);
$this->active = $this->getModelValue($model->active);
}
private function loadNemundoAdminAppDesignerDataAppModelAppModelappModelRow($model) {
$this->appModel = new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelRow($this->row, $model);
}
private function loadNemundoAdminAppDesignerDataAppModelFieldTypeAppModelFieldTypeappFieldTypeRow($model) {
$this->appFieldType = new \Nemundo\Admin\AppDesigner\Data\AppModelFieldType\AppModelFieldTypeRow($this->row, $model);
}
}