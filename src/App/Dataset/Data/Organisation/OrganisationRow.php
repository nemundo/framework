<?php
namespace Nemundo\App\Dataset\Data\Organisation;
class OrganisationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var OrganisationModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $organisation;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->organisation = $this->getModelValue($model->organisation);
}
}