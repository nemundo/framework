<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
class AppPhpClassTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppPhpClassTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppPhpClassTypeModel();
}
}