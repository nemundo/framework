<?php

namespace Nemundo\App\Mail\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Mail\Data\MailCollection;

class MailApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Mail';
        $this->applicationId = 'ff1c819d-f015-4200-8421-b3ba4ad08f0c';
        $this->modelCollectionClass = MailCollection::class;
    }

}