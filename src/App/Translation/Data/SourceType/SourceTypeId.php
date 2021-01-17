<?php
namespace Nemundo\App\Translation\Data\SourceType;
use Nemundo\Model\Id\AbstractModelIdValue;
class SourceTypeId extends AbstractModelIdValue {
/**
* @var SourceTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceTypeModel();
}
}