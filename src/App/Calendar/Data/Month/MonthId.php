<?php
namespace Nemundo\App\Calendar\Data\Month;
use Nemundo\Model\Id\AbstractModelIdValue;
class MonthId extends AbstractModelIdValue {
/**
* @var MonthModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MonthModel();
}
}