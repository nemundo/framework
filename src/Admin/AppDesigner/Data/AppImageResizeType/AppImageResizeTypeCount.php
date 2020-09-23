<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
class AppImageResizeTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppImageResizeTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppImageResizeTypeModel();
}
}