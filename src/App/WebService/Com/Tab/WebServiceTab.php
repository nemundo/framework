<?php

namespace Nemundo\App\WebService\Com\Tab;

use Nemundo\Admin\Com\Tab\AdminTab;
use Nemundo\App\WebService\Site\WebServiceSite;

class WebServiceTab extends AdminTab
{

    public function getContent()
    {

        $this->site = WebServiceSite::$site;
        return parent::getContent();

    }

}