<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
class AppExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $appName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $appPrefix;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $appNamespace;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppModel::class;
$this->externalTableName = "app_app";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

$this->appName = new \Nemundo\Model\Type\Text\TextType();
$this->appName->fieldName = "app_name";
$this->appName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appName->aliasFieldName = $this->appName->tableName . "_" . $this->appName->fieldName;
$this->appName->label = "App Name";
$this->addType($this->appName);

$this->appPrefix = new \Nemundo\Model\Type\Text\TextType();
$this->appPrefix->fieldName = "app_prefix";
$this->appPrefix->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appPrefix->aliasFieldName = $this->appPrefix->tableName . "_" . $this->appPrefix->fieldName;
$this->appPrefix->label = "App Prefix";
$this->addType($this->appPrefix);

$this->appNamespace = new \Nemundo\Model\Type\Text\TextType();
$this->appNamespace->fieldName = "app_namespace";
$this->appNamespace->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->appNamespace->aliasFieldName = $this->appNamespace->tableName . "_" . $this->appNamespace->fieldName;
$this->appNamespace->label = "App Namespace";
$this->addType($this->appNamespace);

}
}