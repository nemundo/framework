<?php
namespace Nemundo\App\WebLog\Data\WebLog;
class WebLogBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WebLogModel
*/
protected $model;

/**
* @var string
*/
public $url;

/**
* @var string
*/
public $ipAddress;

/**
* @var string
*/
public $userAgent;

public function __construct() {
parent::__construct();
$this->model = new WebLogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->ipAddress, $this->ipAddress);
$this->typeValueList->setModelValue($this->model->userAgent, $this->userAgent);
$id = parent::save();
return $id;
}
}