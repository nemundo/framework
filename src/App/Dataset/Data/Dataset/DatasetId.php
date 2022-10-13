<?php
namespace Nemundo\App\Dataset\Data\Dataset;
use Nemundo\Model\Id\AbstractModelIdValue;
class DatasetId extends AbstractModelIdValue {
/**
* @var DatasetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DatasetModel();
}
}