<?php
namespace Nemundo\App\Dataset\Data\Dataset;
use Nemundo\Model\Data\AbstractModelUpdate;
class DatasetUpdate extends AbstractModelUpdate {
/**
* @var DatasetModel
*/
public $model;

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
* @var string
*/
public $organisationId;

/**
* @var string
*/
public $categoryId;

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

public function __construct() {
parent::__construct();
$this->model = new DatasetModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->dataset, $this->dataset);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->licence, $this->licence);
$this->typeValueList->setModelValue($this->model->organisationId, $this->organisationId);
$this->typeValueList->setModelValue($this->model->categoryId, $this->categoryId);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$this->typeValueList->setModelValue($this->model->licenceUrl, $this->licenceUrl);
$this->typeValueList->setModelValue($this->model->documentationUrl, $this->documentationUrl);
parent::update();
}
}