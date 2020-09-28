<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
class AppModelIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $appModelId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType
*/
public $appModel;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $indexTypeId;

/**
* @var \Nemundo\Admin\AppDesigner\Data\AppModelIndexType\AppModelIndexTypeExternalType
*/
public $indexType;

protected function loadModel() {
$this->tableName = "app_model_index";
$this->aliasTableName = "app_model_index";
$this->label = "Index";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_model_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_model_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->appModelId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->appModelId->tableName = "app_model_index";
$this->appModelId->fieldName = "app_model";
$this->appModelId->aliasFieldName = "app_model_index_app_model";
$this->appModelId->label = "";
$this->appModelId->allowNullValue = false;

$this->indexTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->indexTypeId->tableName = "app_model_index";
$this->indexTypeId->fieldName = "app_model_index_type";
$this->indexTypeId->aliasFieldName = "app_model_index_app_model_index_type";
$this->indexTypeId->label = "";
$this->indexTypeId->allowNullValue = false;

}
public function loadAppModel() {
if ($this->appModel == null) {
$this->appModel = new \Nemundo\Admin\AppDesigner\Data\AppModel\AppModelExternalType($this, "app_model_index_app_model");
$this->appModel->tableName = "app_model_index";
$this->appModel->fieldName = "app_model";
$this->appModel->aliasFieldName = "app_model_index_app_model";
$this->appModel->label = "";
$this->appModel->visible->form = false;
$this->appModel->visible->table = false;
}
return $this;
}
public function loadIndexType() {
if ($this->indexType == null) {
$this->indexType = new \Nemundo\Admin\AppDesigner\Data\AppModelIndexType\AppModelIndexTypeExternalType($this, "app_model_index_app_model_index_type");
$this->indexType->tableName = "app_model_index";
$this->indexType->fieldName = "app_model_index_type";
$this->indexType->aliasFieldName = "app_model_index_app_model_index_type";
$this->indexType->label = "";
}
return $this;
}
}