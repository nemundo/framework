<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppModelRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppModelModel
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
* @var bool
*/
public $editable;

/**
* @var string
*/
public $appId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\App\AppRow
*/
public $app;

/**
* @var string
*/
public $templateModelId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppTemplateModel\AppTemplateModelRow
*/
public $templateModel;

/**
* @var string
*/
public $modelLabel;

/**
* @var string
*/
public $modelTableName;

/**
* @var string
*/
public $modelPrimaryIndexId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType\AppModelPrimaryIndexTypeRow
*/
public $modelPrimaryIndex;

/**
* @var string
*/
public $modelClassName;

/**
* @var string
*/
public $modelNamespace;

/**
* @var bool
*/
public $modelCreateAdminOrm;

/**
* @var string
*/
public $rowClassName;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->active = $this->getModelValue($model->active);
$this->editable = $this->getModelValue($model->editable);
$this->appId = $this->getModelValue($model->appId);
if ($model->app !== null) {
$this->loadNemundoAdminAppDesignerDataAppAppappRow($model->app);
}
$this->templateModelId = $this->getModelValue($model->templateModelId);
if ($model->templateModel !== null) {
$this->loadNemundoAdminAppDesignerDataAppTemplateModelAppTemplateModeltemplateModelRow($model->templateModel);
}
$this->modelLabel = $this->getModelValue($model->modelLabel);
$this->modelTableName = $this->getModelValue($model->modelTableName);
$this->modelPrimaryIndexId = $this->getModelValue($model->modelPrimaryIndexId);
if ($model->modelPrimaryIndex !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelPrimaryIndexTypeAppModelPrimaryIndexTypemodelPrimaryIndexRow($model->modelPrimaryIndex);
}
$this->modelClassName = $this->getModelValue($model->modelClassName);
$this->modelNamespace = $this->getModelValue($model->modelNamespace);
$this->modelCreateAdminOrm = $this->getModelValue($model->modelCreateAdminOrm);
$this->rowClassName = $this->getModelValue($model->rowClassName);
}
private function loadNemundoAdminAppDesignerDataAppAppappRow($model) {
$this->app = new \Nemundo\Admin\AppDesigner\Data\App\AppRow($this->row, $model);
}
private function loadNemundoAdminAppDesignerDataAppTemplateModelAppTemplateModeltemplateModelRow($model) {
$this->templateModel = new \Nemundo\Admin\AppDesigner\Data\AppTemplateModel\AppTemplateModelRow($this->row, $model);
}
private function loadNemundoAdminAppDesignerDataAppModelPrimaryIndexTypeAppModelPrimaryIndexTypemodelPrimaryIndexRow($model) {
$this->modelPrimaryIndex = new \Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType\AppModelPrimaryIndexTypeRow($this->row, $model);
}
}