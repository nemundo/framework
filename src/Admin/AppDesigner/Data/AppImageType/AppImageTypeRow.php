<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppImageTypeModel
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
public $size;

/**
* @var string
*/
public $resizeTypeId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppImageResizeType\AppImageResizeTypeRow
*/
public $resizeType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->appFieldId = $this->getModelValue($model->appFieldId);
if ($model->appField !== null) {
$this->loadNemundoAdminAppDesignerDataAppModelFieldAppModelFieldappFieldRow($model->appField);
}
$this->size = $this->getModelValue($model->size);
$this->resizeTypeId = $this->getModelValue($model->resizeTypeId);
if ($model->resizeType !== null) {
$this->loadNemundoAdminAppDesignerDataAppImageResizeTypeAppImageResizeTyperesizeTypeRow($model->resizeType);
}
}
private function loadNemundoAdminAppDesignerDataAppModelFieldAppModelFieldappFieldRow($model) {
$this->appField = new \Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldRow($this->row, $model);
}
private function loadNemundoAdminAppDesignerDataAppImageResizeTypeAppImageResizeTyperesizeTypeRow($model) {
$this->resizeType = new \Nemundo\Admin\AppDesigner\Data\AppImageResizeType\AppImageResizeTypeRow($this->row, $model);
}
}