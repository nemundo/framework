<?php
namespace Nemundo\Admin\AppDesigner\Data\AppFileType;
class AppFileTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppFileTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppFileTypeModel();
}
}