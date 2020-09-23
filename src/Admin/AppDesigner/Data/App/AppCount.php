<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
class AppCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModel();
}
}