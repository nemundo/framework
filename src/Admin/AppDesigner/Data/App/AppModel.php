<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
class AppModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "app_app";
$this->aliasTableName = "app_app";
$this->label = "";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_app";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_app_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "app_app";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "app_app_active";
$this->active->label = "Active";
$this->active->defaultValue = 1;
$this->active->allowNullValue = false;
$this->active->visible->form = false;
$this->active->visible->table = false;
$this->active->visible->view = false;

$this->appName = new \Nemundo\Model\Type\Text\TextType($this);
$this->appName->tableName = "app_app";
$this->appName->fieldName = "app_name";
$this->appName->aliasFieldName = "app_app_app_name";
$this->appName->label = "App Name";
$this->appName->validation = true;
$this->appName->allowNullValue = false;
$this->appName->length = 255;

$this->appPrefix = new \Nemundo\Model\Type\Text\TextType($this);
$this->appPrefix->tableName = "app_app";
$this->appPrefix->fieldName = "app_prefix";
$this->appPrefix->aliasFieldName = "app_app_app_prefix";
$this->appPrefix->label = "App Prefix";
$this->appPrefix->validation = true;
$this->appPrefix->allowNullValue = false;
$this->appPrefix->length = 255;

$this->appNamespace = new \Nemundo\Model\Type\Text\TextType($this);
$this->appNamespace->tableName = "app_app";
$this->appNamespace->fieldName = "app_namespace";
$this->appNamespace->aliasFieldName = "app_app_app_namespace";
$this->appNamespace->label = "App Namespace";
$this->appNamespace->validation = true;
$this->appNamespace->allowNullValue = false;
$this->appNamespace->length = 255;

$this->addDefaultType($this->appName);
$this->addDefaultOrderType($this->appName);
}
}