<?php
namespace Nemundo\App\WebLog\Data\WebLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class WebLogUpdate extends AbstractModelUpdate {
/**
* @var WebLogModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->ipAddress, $this->ipAddress);
$this->typeValueList->setModelValue($this->model->userAgent, $this->userAgent);
parent::update();
}
}