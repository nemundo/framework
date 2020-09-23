<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
class AppTemplateModel extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var AppTemplateModelModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $template;

/**
* @var string
*/
public $templateClass;

public function __construct() {
parent::__construct();
$this->model = new AppTemplateModelModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->template, $this->template);
$this->typeValueList->setModelValue($this->model->templateClass, $this->templateClass);
$id = parent::save();
return $id;
}
}