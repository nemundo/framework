<?php

namespace Nemundo\App\Translation\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Translation\Application\TranslationApplication;
use Nemundo\App\Translation\Data\TranslationModelCollection;
use Nemundo\App\Translation\Setup\LanguageSetup;
use Nemundo\App\Translation\Setup\SourceSetup;
use Nemundo\App\Translation\Type\Source\LargeTextSourceType;
use Nemundo\App\Translation\Type\Source\TextSourceType;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class TranslationInstall extends AbstractInstall
{
    public function install()
    {
        (new ApplicationSetup())
            ->addApplication(new TranslationApplication());

        (new ModelCollectionSetup())
            ->addCollection(new TranslationModelCollection());


        (new SourceSetup())
            ->addSourceType(new TextSourceType())
            ->addSourceType(new LargeTextSourceType());

    }




}