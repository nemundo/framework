<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppId extends AbstractModelIdValue {
/**
* @var AppModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModel();
}
}