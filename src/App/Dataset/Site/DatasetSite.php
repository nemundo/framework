<?php

namespace Nemundo\App\Dataset\Site;

use Nemundo\App\Dataset\Page\DatasetPage;
use Nemundo\Web\Site\AbstractSite;

class DatasetSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Dataset';
        $this->url = 'dataset';
    }

    public function loadContent()
    {
        (new DatasetPage())->render();
    }
}