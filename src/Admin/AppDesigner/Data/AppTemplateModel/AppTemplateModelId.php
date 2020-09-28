<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppTemplateModelId extends AbstractModelIdValue {
/**
* @var AppTemplateModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppTemplateModelModel();
}
}