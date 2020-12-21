<?php

namespace Nemundo\Admin\MySql\Site;

use Nemundo\Admin\MySql\Navigation\MySqlNavigation;
use Nemundo\Db\Provider\MySql\Database\MySqlDatabaseReader;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Web\Site\AbstractSite;

class MySqlDatabaseSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Database';
        $this->url = 'database';
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();
        new MySqlNavigation($page);

        $row = new BootstrapRow($page);
        $col = new BootstrapColumn($row);


        //$form = new MySqlDatabaseForm($col);

        $list = new BootstrapHyperlinkList($page);
        $database = new MySqlDatabaseReader();
        foreach ($database->getData() as $database) {
            $list->addHyperlink($database->databaseName);
        }

        $page->render();


    }

}