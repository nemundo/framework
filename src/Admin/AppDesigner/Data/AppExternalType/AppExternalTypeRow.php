<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
class AppExternalTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppExternalTypeModel
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
* @var string
*/
public $externalModelId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelRow
*/
public $externalModel;

/**
* @var bool
*/
public $appLoadModel;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->appFieldId = $this->getModelValue($model->appFieldId);
if ($model->appField !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelFieldAppModelFieldappFieldRow($model->appField);
}
$this->externalModelId = $this->getModelValue($model->externalModelId);
if ($model->externalModel !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelAppModelexternalModelRow($model->externalModel);
}
$this->appLoadModel = $this->getModelValue($model->appLoadModel);
}
private function loadNemundoAdminAppDesignerDataAppModelFieldAppModelFieldappFieldRow($model) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldRow($this->row, $model);
}
private function loadNemundoAdminAppDesignerDataAppModelAppModelexternalModelRow($model) {
$this->externalModel = new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelRow($this->row, $model);
}
}