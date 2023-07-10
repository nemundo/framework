<?php

namespace Nemundo\App\Backup\Site;

use Nemundo\App\Backup\Page\ImportPage;
use Nemundo\Web\Site\AbstractSite;

class ImportSite extends AbstractSite
{

    /**
     * @var ImportSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Import';
        $this->url = 'import';
        ImportSite::$site = $this;
    }

    public function loadContent()
    {
        (new ImportPage())->render();
    }
}