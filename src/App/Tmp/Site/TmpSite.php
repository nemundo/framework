<?php

namespace Nemundo\App\Tmp\Site;

use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\Tmp\Page\TmpPage;

class TmpSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Tmp';
        $this->url = 'tmp';
    }

    public function loadContent()
    {
        (new TmpPage())->render();
    }
}