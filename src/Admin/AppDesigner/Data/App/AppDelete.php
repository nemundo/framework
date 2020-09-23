<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
class AppDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModel();
}
}