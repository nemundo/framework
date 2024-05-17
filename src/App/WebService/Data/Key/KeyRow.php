<?php
namespace Nemundo\App\WebService\Data\Key;
class KeyRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var KeyModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $key;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->key = $this->getModelValue($model->key);
}
}