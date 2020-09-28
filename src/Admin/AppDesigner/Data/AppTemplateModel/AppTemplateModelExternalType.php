<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
class AppTemplateModelExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = AppTemplateModelModel::class;
$this->externalTableName = "app_template_model";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->template = new \Nemundo\Model\Type\Text\TextType();
$this->template->fieldName = "template";
$this->template->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->template->aliasFieldName = $this->template->tableName . "_" . $this->template->fieldName;
$this->template->label = "Template";
$this->addType($this->template);

$this->templateClass = new \Nemundo\Model\Type\Php\PhpClassType();
$this->templateClass->fieldName = "template_class";
$this->templateClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->templateClass->aliasFieldName = $this->templateClass->tableName . "_" . $this->templateClass->fieldName;
$this->templateClass->label = "Template Class";
$this->addType($this->templateClass);

}
}