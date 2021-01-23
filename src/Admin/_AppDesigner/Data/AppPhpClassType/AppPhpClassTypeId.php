<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppPhpClassTypeId extends AbstractModelIdValue {
/**
* @var AppPhpClassTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppPhpClassTypeModel();
}
}