<?php
namespace Nemundo\App\Calendar\Data\Month;
class MonthDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MonthModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MonthModel();
}
}