<?php

namespace Nemundo\App\Translation\Site;

use Nemundo\App\Translation\Data\Source\SourceReader;
use Nemundo\App\Translation\Parameter\SourceParameter;
use Nemundo\Core\Debug\Debug;
use Nemundo\Web\Site\AbstractSite;

class SourceDeleteSite extends AbstractSite
{

    /**
     * @var AbstractSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'SourceDelete';
        $this->url = 'source-delete';
        $this->menuActive = false;

        SourceDeleteSite::$site = $this;

    }

    public function loadContent()
    {

        $sourceId = (new SourceParameter())->getValue();

        $sourceReader = new SourceReader();
        $sourceReader->model->loadSourceType();
        $sourceRow = $sourceReader->getRowById($sourceId);

        $class = $sourceRow->sourceType->phpClass;

        $sourceType = new $class();


        (new Debug())->write($sourceType);


        //(new SourceDelete())->deleteById($sourceId);

    }
}