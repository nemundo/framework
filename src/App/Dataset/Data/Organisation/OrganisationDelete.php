<?php
namespace Nemundo\App\Dataset\Data\Organisation;
class OrganisationDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var OrganisationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OrganisationModel();
}
}