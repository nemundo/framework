<?php

namespace Nemundo\App\Translation\Site;

use Nemundo\App\Translation\Page\TranslationPage;
use Nemundo\Web\Site\AbstractSite;

class TranslationSite extends AbstractSite
{

    /**
     * @var TranslationSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Translation';
        $this->url = 'translation';

        TranslationSite::$site = $this;

        new LanguageSite($this);
        new SourceDeleteSite($this);

    }

    public function loadContent()
    {
        (new TranslationPage())->render();
    }
}