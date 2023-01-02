<?php
namespace Nemundo\App\Calendar\Data\Month;
use Nemundo\Model\Data\AbstractModelUpdate;
class MonthUpdate extends AbstractModelUpdate {
/**
* @var MonthModel
*/
public $model;

/**
* @var string
*/
public $month;

public function __construct() {
parent::__construct();
$this->model = new MonthModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->month, $this->month);
parent::update();
}
}