<?php

namespace Nemundo\App\System\Site;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\System\Com\SystemInformationTable;

class SystemSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'System';
        $this->url = 'system';
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();
        new SystemInformationTable($page);
        $page->render();

    }

}