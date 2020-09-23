<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
class AppTemplateModelRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var AppTemplateModelModel
*/
public $model;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->template = $this->getModelValue($model->template);
$this->templateClass = $this->getModelValue($model->templateClass);
}
/**
* @return \Nemundo\Orm\Model\AbstractOrmModel
*/
public function getTemplateClassObject() {
$object = (new \Nemundo\Core\System\ObjectBuilder)->getObject($this->templateClass);
return $object;
}
}