<?php
namespace Nemundo\App\Translation\Data\SourceType;
class SourceTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SourceTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceTypeModel();
}
}