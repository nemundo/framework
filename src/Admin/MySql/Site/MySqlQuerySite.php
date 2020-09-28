<?php

namespace Nemundo\Admin\MySql\Site;


use Nemundo\Admin\MySql\Com\MySqlQuery;
use Nemundo\Admin\MySql\Navigation\MySqlNavigation;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;

use Nemundo\Web\Site\AbstractSite;

class MySqlQuerySite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'MySql Query';
        $this->url = 'mysql-query';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();
        new MySqlNavigation($page);

        new MySqlQuery($page);
        $page->render();

    }


}