<?php


namespace Nemundo\App\Translation\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\Scheduler\Site\SchedulerSite;
use Nemundo\App\Translation\Site\TranslationSite;
use Nemundo\Com\Template\AbstractTemplateDocument;

class TranslationTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {
        parent::loadContainer();

        $nav = new AdminNavigation($this);
        $nav->site =TranslationSite::$site;

    }

}