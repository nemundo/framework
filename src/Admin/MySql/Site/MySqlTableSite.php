<?php

namespace Nemundo\Admin\MySql\Site;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\MySql\Navigation\MySqlNavigation;
use Nemundo\Admin\MySql\Parameter\TableParameter;
use Nemundo\Admin\MySql\Site\Action\MySqlDropTableSite;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Web\Site\AbstractSite;

class MySqlTableSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Table';
        $this->url = 'table';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();
        new MySqlNavigation($page);

        $row = new BootstrapRow($page);

        $col = new BootstrapColumn($row);
        $col->columnWidth = 4;

        $table = new AdminTable($col);

        $reader = new MySqlTableReader();
        foreach ($reader->getData() as $mySqlTable) {

            $row = new TableRow($table);
            $row->addText($mySqlTable->tableName);

            $site = clone(MySqlDropTableSite::$site);
            $site->addParameter(new TableParameter($mySqlTable->tableName));
            $row->addIconSite($site);

        }

        $page->render();

    }

}