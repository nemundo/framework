<?php

namespace Nemundo\App\Dataset\Site;

use Nemundo\App\Dataset\Page\DataPage;
use Nemundo\Web\Site\AbstractSite;

class DataSite extends AbstractSite
{

    /**
     * @var DataSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Data';
        $this->url = 'data-container';
        $this->menuActive = false;

        DataSite::$site = $this;

    }

    public function loadContent()
    {
        (new DataPage())->render();
    }
}