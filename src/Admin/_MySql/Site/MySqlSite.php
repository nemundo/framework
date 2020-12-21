<?php

namespace Nemundo\Admin\MySql\Site;


use Nemundo\Admin\MySql\Com\MySqlAdmin;
use Nemundo\Admin\MySql\Navigation\MySqlNavigation;
use Nemundo\Admin\MySql\Site\Action\CsvExportSite;
use Nemundo\Admin\MySql\Site\Action\ExcelExportSite;
use Nemundo\Admin\MySql\Site\Action\MySqlDropTableSite;
use Nemundo\Admin\MySql\Site\Action\MySqlEmptyTableSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class MySqlSite extends AbstractSite
{

    /**
     * @var MySqlSite
     */
    public static $site;


    protected function loadSite()
    {

        $this->title = 'MySql2';
        $this->url = 'mysql2';

        new MySqlApplicationDataSite($this);
        new MySqlQuerySite($this);
        new MySqlExecuteSite($this);
        new MySqlTableSite($this);
        new MySqlTableSizeSite($this);
        new MySqlExplainSite($this);
        new MySqlJoinQuerySite($this);
        //new MySqlDatabaseSite($this);

        //new MySqlAdminSite($this);
        //new MySqlDataAdminSite($this);

        new MySqlEmptyTableSite($this);
        new MySqlDropTableSite($this);
        new CsvExportSite($this);
        new ExcelExportSite($this);


        MySqlSite::$site = $this;
    }


    public function loadContent()
    {

        //$page = new MySqlTemplate();
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();




//        new MySqlNavigation($page);
//        new MySqlAdmin($page);

        $page->render();

    }


}