<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
class AppModelIndexRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppModelIndexModel
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
public $indexTypeId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelIndexType\AppModelIndexTypeRow
*/
public $indexType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->appModelId = $this->getModelValue($model->appModelId);
if ($model->appModel !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelAppModelappModelRow($model->appModel);
}
$this->indexTypeId = $this->getModelValue($model->indexTypeId);
if ($model->indexType !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelIndexTypeAppModelIndexTypeindexTypeRow($model->indexType);
}
}
private function loadNemundoAdminAppDesignerDataAppModelAppModelappModelRow($model) {
$this->appModel = new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelRow($this->row, $model);
}
private function loadNemundoAdminAppDesignerDataAppModelIndexTypeAppModelIndexTypeindexTypeRow($model) {
$this->indexType = new \Nemundo\Admin\AppDesigner\Data\AppModelIndexType\AppModelIndexTypeRow($this->row, $model);
}
}