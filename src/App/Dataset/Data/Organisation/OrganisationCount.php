<?php
namespace Nemundo\App\Dataset\Data\Organisation;
class OrganisationCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var OrganisationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OrganisationModel();
}
}