<?php
namespace Nemundo\App\Dataset\Data\Dataset;
class DatasetRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var DatasetModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $dataset;

/**
* @var string
*/
public $url;

/**
* @var string
*/
public $description;

/**
* @var string
*/
public $licence;

/**
* @var int
*/
public $organisationId;

/**
* @var \Nemundo\App\Dataset\Data\Organisation\OrganisationRow
*/
public $organisation;

/**
* @var int
*/
public $categoryId;

/**
* @var \Nemundo\App\Dataset\Data\Category\CategoryRow
*/
public $category;

/**
* @var string
*/
public $phpClass;

/**
* @var string
*/
public $licenceUrl;

/**
* @var string
*/
public $documentationUrl;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->dataset = $this->getModelValue($model->dataset);
$this->url = $this->getModelValue($model->url);
$this->description = $this->getModelValue($model->description);
$this->licence = $this->getModelValue($model->licence);
$this->organisationId = intval($this->getModelValue($model->organisationId));
if ($model->organisation !== null) {
$this->loadNemundoAppDatasetDataOrganisationOrganisationorganisationRow($model->organisation);
}
$this->categoryId = intval($this->getModelValue($model->categoryId));
if ($model->category !== null) {
$this->loadNemundoAppDatasetDataCategoryCategorycategoryRow($model->category);
}
$this->phpClass = $this->getModelValue($model->phpClass);
$this->licenceUrl = $this->getModelValue($model->licenceUrl);
$this->documentationUrl = $this->getModelValue($model->documentationUrl);
}
private function loadNemundoAppDatasetDataOrganisationOrganisationorganisationRow($model) {
$this->organisation = new \Nemundo\App\Dataset\Data\Organisation\OrganisationRow($this->row, $model);
}
private function loadNemundoAppDatasetDataCategoryCategorycategoryRow($model) {
$this->category = new \Nemundo\App\Dataset\Data\Category\CategoryRow($this->row, $model);
}
}