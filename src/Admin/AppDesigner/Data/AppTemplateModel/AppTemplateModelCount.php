<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
class AppTemplateModelCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppTemplateModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppTemplateModelModel();
}
}