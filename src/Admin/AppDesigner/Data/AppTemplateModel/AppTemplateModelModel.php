<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
class AppTemplateModelModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $template;

/**
* @var \Nemundo\Model\Type\Php\PhpClassType
*/
public $templateClass;

protected function loadModel() {
$this->tableName = "app_template_model";
$this->aliasTableName = "app_template_model";
$this->label = "Template Model";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "app_template_model";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "app_template_model_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->template = new \Nemundo\Model\Type\Text\TextType($this);
$this->template->tableName = "app_template_model";
$this->template->fieldName = "template";
$this->template->aliasFieldName = "app_template_model_template";
$this->template->label = "Template";
$this->template->validation = true;
$this->template->allowNullValue = false;
$this->template->length = 255;

$this->templateClass = new \Nemundo\Model\Type\Php\PhpClassType($this);
$this->templateClass->tableName = "app_template_model";
$this->templateClass->fieldName = "template_class";
$this->templateClass->aliasFieldName = "app_template_model_template_class";
$this->templateClass->label = "Template Class";
$this->templateClass->allowNullValue = false;
$this->templateClass->phpClassName = \Nemundo\Orm\Model\AbstractOrmModel::class;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "";
$index->addType($this->templateClass);

$this->addDefaultType($this->template);
$this->addDefaultOrderType($this->template);
}
}