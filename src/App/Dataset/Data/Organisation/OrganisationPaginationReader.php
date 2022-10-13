<?php
namespace Nemundo\App\Dataset\Data\Organisation;
class OrganisationPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var OrganisationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OrganisationModel();
}
/**
* @return OrganisationRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new OrganisationRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}