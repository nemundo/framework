<?php
namespace Nemundo\App\Dataset\Data\Organisation;
use Nemundo\Model\Data\AbstractModelUpdate;
class OrganisationUpdate extends AbstractModelUpdate {
/**
* @var OrganisationModel
*/
public $model;

/**
* @var string
*/
public $organisation;

public function __construct() {
parent::__construct();
$this->model = new OrganisationModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->organisation, $this->organisation);
parent::update();
}
}