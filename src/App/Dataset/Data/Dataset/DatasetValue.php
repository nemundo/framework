<?php
namespace Nemundo\App\Dataset\Data\Dataset;
class DatasetValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var DatasetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DatasetModel();
}
}