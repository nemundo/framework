<?php

namespace Nemundo\App\Translation\Site;

use Nemundo\App\Translation\Page\LanguagePage;
use Nemundo\App\Translation\Site\Export\TranslationExportSite;
use Nemundo\Web\Site\AbstractSite;

class LanguageSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Language';
        $this->url = 'language';

        new TranslationExportSite($this);

    }

    public function loadContent()
    {
        (new LanguagePage())->render();
    }
}