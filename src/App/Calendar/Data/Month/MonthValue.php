<?php
namespace Nemundo\App\Calendar\Data\Month;
class MonthValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var MonthModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MonthModel();
}
}