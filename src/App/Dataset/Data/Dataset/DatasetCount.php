<?php
namespace Nemundo\App\Dataset\Data\Dataset;
class DatasetCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var DatasetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DatasetModel();
}
}