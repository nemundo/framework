<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
class AppModelDefaultOrderTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppModelDefaultOrderTypeModel
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
$this->appModelId = $this->getModelValue($model->appModelId);
if ($model->appModel !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelAppModelappModelRow($model->appModel);
}
$this->appFieldId = $this->getModelValue($model->appFieldId);
if ($model->appField !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelFieldAppModelFieldappFieldRow($model->appField);
}
$this->itemOrder = $this->getModelValue($model->itemOrder);
}
private function loadNemundoAdminAppDesignerDataAppModelAppModelappModelRow($model) {
$this->appModel = new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelRow($this->row, $model);
}
private function loadNemundoAdminAppDesignerDataAppModelFieldAppModelFieldappFieldRow($model) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldRow($this->row, $model);
}
}