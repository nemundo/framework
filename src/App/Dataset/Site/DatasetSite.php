<?php

namespace Nemundo\App\Dataset\Site;

use Nemundo\App\Dataset\Page\DatasetPage;
use Nemundo\App\Dataset\Usergroup\DatasetUsergroup;
use Nemundo\Web\Site\AbstractSite;

class DatasetSite extends AbstractSite
{

    /**
     * @var DatasetSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Dataset';
        $this->url = 'dataset';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new DatasetUsergroup());

        DatasetSite::$site = $this;

        new DataSite($this);

    }

    public function loadContent()
    {
        (new DatasetPage())->render();
    }
}