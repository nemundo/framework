<?php

namespace Nemundo\Admin\MySql\Site;


use Nemundo\Admin\AdminConfig;
use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Web\Site\AbstractSite;

class MySqlDataAdminSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Data View';
        $this->url = 'view';
    }


    public function loadContent()
    {

        $className = AdminConfig::$defaultTemplateClassName;

        /** @var HtmlDocument $page */
        $page = new $className();

        $page->render();

    }

}