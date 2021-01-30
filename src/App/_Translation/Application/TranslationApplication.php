<?php

namespace Nemundo\App\Translation\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Translation\Data\TranslationModelCollection;

class TranslationApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Translation';
        $this->applicationId = '5f4dde16-306d-47f0-bc3b-6f62c75630ce';
        $this->modelCollectionClass = TranslationModelCollection::class;
    }
}