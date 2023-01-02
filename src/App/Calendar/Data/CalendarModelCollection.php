<?php
namespace Nemundo\App\Calendar\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class CalendarModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\Calendar\Data\Month\MonthModel());
}
}