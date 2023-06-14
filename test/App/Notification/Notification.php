<?php

require __DIR__.'/../../../config.php';

(new \Nemundo\App\Notification\Application\NotificationApplication())->installApp();


class TestUsergroup extends \Nemundo\User\Usergroup\AbstractUsergroup {
    protected function loadUsergroup()
    {
        $this->usergroupId ='123';
        // TODO: Implement loadUsergroup() method.
    }
}


$builder = new \Nemundo\App\Notification\Builder\NotificationBuilder();
$builder->sendNotification(new TestUsergroup(), 'Test Meldung');

