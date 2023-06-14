<?php

namespace Nemundo\App\Notification\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Mail\Application\MailApplication;
use Nemundo\App\Notification\Data\NotificationModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class NotificationInstall extends AbstractInstall
{
    public function install()
    {

        (new MailApplication())->installApp();

        (new ModelCollectionSetup())
            ->addCollection(new NotificationModelCollection());

    }
}