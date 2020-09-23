<?php

namespace Nemundo\App\WebLog\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class WebLogSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Web Log';
        $this->url = 'web-log';
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        /*
        $table = new WebLogTable($page);
        $table->addOrder($table->model->dateTime, SortOrder::DESCENDING);
        $table->limit = 100;*/

        $page->render();

    }
}