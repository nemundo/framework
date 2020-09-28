<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
class AppTemplateModelDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppTemplateModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppTemplateModelModel();
}
}