<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
use Nemundo\Model\Data\AbstractModelUpdate;
class AppTemplateModelUpdate extends AbstractModelUpdate {
/**
* @var AppTemplateModelModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->template, $this->template);
$this->typeValueList->setModelValue($this->model->templateClass, $this->templateClass);
parent::update();
}
}