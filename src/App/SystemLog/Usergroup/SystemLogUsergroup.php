<?php
namespace Nemundo\App\SystemLog\Usergroup;
use Nemundo\User\Usergroup\AbstractUsergroup;
class SystemLogUsergroup extends AbstractUsergroup {
protected function loadUsergroup() {
$this->usergroup = 'SystemLog';
$this->usergroupId = 'a4e20840-3f12-46b9-9709-1c9583acb225';
}
}