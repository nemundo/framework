<?php
namespace Nemundo\App\Translation\Data\SourceType;
class SourceTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SourceTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceTypeModel();
}
}