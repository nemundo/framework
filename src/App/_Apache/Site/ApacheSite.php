<?php


namespace Nemundo\App\Apache\Site;


use Nemundo\App\Apache\Page\ApachePage;
use Nemundo\Web\Site\AbstractSite;

class ApacheSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title='Apache';
        $this->url='apache';

        new ConfigDeleteSiteOld($this);

    }

    public function loadContent()
    {

        (new ApachePage())->render();

    }

}