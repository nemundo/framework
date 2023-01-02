<?php
namespace Nemundo\App\Calendar\Data\Month;
class MonthBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var MonthModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var string
*/
public $month;

public function __construct() {
parent::__construct();
$this->model = new MonthModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->month, $this->month);
$id = parent::save();
return $id;
}
}