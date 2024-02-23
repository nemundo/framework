<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroupRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var UserUsergroupModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Reader\User\UserDataRow
*/
public $user;

/**
* @var string
*/
public $usergroupId;

/**
* @var \Nemundo\User\Data\Usergroup\UsergroupRow
*/
public $usergroup;

/**
* @var bool
*/
public $importStatus;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->usergroupId = $this->getModelValue($model->usergroupId);
if ($model->usergroup !== null) {
$this->loadNemundoUserDataUsergroupUsergroupusergroupRow($model->usergroup);
}
$this->importStatus = boolval($this->getModelValue($model->importStatus));
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Reader\User\UserDataRow($this->row, $model);
}
private function loadNemundoUserDataUsergroupUsergroupusergroupRow($model) {
$this->usergroup = new \Nemundo\User\Data\Usergroup\UsergroupRow($this->row, $model);
}
}