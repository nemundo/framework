<?php
namespace Nemundo\App\Dataset\Data\Dataset;
class DatasetDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var DatasetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DatasetModel();
}
}