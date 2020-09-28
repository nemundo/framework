<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
class AppModelIndexExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $appModelId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType
*/
public $appModel;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $indexTypeId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelIndexType\AppModelIndexTypeExternalType
*/
public $indexType;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppModelIndexModel::class;
$this->externalTableName = "app_model_index";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->appModelId = new \Nemundo\Model\Type\Id\IdType();
$this->appModelId->fieldName = "app_model";
$this->appModelId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appModelId->aliasFieldName = $this->appModelId->tableName ."_".$this->appModelId->fieldName;
$this->appModelId->label = "";
$this->addType($this->appModelId);

$this->indexTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->indexTypeId->fieldName = "app_model_index_type";
$this->indexTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->indexTypeId->aliasFieldName = $this->indexTypeId->tableName ."_".$this->indexTypeId->fieldName;
$this->indexTypeId->label = "";
$this->addType($this->indexTypeId);

}
public function loadAppModel() {
if ($this->appModel == null) {
$this->appModel = new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType(null, $this->parentFieldName . "_app_model");
$this->appModel->fieldName = "app_model";
$this->appModel->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appModel->aliasFieldName = $this->appModel->tableName ."_".$this->appModel->fieldName;
$this->appModel->label = "";
$this->addType($this->appModel);
}
return $this;
}
public function loadIndexType() {
if ($this->indexType == null) {
$this->indexType = new \Nemundo\Admin\AppDesigner\Data\AppModelIndexType\AppModelIndexTypeExternalType(null, $this->parentFieldName . "_app_model_index_type");
$this->indexType->fieldName = "app_model_index_type";
$this->indexType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->indexType->aliasFieldName = $this->indexType->tableName ."_".$this->indexType->fieldName;
$this->indexType->label = "";
$this->addType($this->indexType);
}
return $this;
}
}