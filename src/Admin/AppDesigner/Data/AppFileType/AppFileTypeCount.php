<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
class AppFileTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppFileTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppFileTypeModel();
}
}