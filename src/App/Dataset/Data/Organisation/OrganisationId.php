<?php
namespace Nemundo\App\Dataset\Data\Organisation;
use Nemundo\Model\Id\AbstractModelIdValue;
class OrganisationId extends AbstractModelIdValue {
/**
* @var OrganisationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OrganisationModel();
}
}