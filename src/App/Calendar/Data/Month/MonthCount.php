<?php
namespace Nemundo\App\Calendar\Data\Month;
class MonthCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var MonthModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MonthModel();
}
}