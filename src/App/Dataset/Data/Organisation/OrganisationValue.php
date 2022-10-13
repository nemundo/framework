<?php
namespace Nemundo\App\Dataset\Data\Organisation;
class OrganisationValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var OrganisationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OrganisationModel();
}
}