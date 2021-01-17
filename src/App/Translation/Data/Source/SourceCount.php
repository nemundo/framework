<?php
namespace Nemundo\App\Translation\Data\Source;
class SourceCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SourceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceModel();
}
}