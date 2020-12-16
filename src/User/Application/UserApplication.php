<?php

namespace Nemundo\User\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\User\Data\UserModelCollection;

class UserApplication extends AbstractApplication
{

    protected function loadApplication()
    {

        $this->applicationName = 'user';
        $this->application = 'User';
        $this->applicationId = '3fe9852f-322d-4d9d-af37-eaafdcda8f25';
        $this->modelCollectionClass = UserModelCollection::class;

    }

}