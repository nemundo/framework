<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppFileTypeId extends AbstractModelIdValue {
/**
* @var AppFileTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppFileTypeModel();
}
}