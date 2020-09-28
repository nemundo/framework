<?php
namespace Nemundo\App\WebLog\Data\WebLog;
class WebLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WebLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $url;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var string
*/
public $ipAddress;

/**
* @var string
*/
public $userAgent;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->url = $this->getModelValue($model->url);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->ipAddress = $this->getModelValue($model->ipAddress);
$this->userAgent = $this->getModelValue($model->userAgent);
}
}