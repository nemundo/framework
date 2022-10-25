<?php

namespace Nemundo\App\Dataset\Site;

use Nemundo\App\Dataset\Page\DataSourcePage;
use Nemundo\Web\Site\AbstractSite;

class DataSourceSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Data Source';
        $this->url = 'data-source';
    }

    public function loadContent()
    {
        (new DataSourcePage())->render();
    }
}