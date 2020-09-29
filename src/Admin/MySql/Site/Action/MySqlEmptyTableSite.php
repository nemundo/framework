<?php

namespace Nemundo\Admin\MySql\Site\Action;


use Nemundo\Admin\MySql\Parameter\TableParameter;
use Nemundo\Db\Delete\DataDelete;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Http\Url\UrlReferer;

// EmptyTableSite
class MySqlEmptyTableSite extends AbstractSite
{

    /**
     * @var MySqlEmptyTableSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Empty Table';
        $this->url = 'empty-table';
        $this->menuActive = false;
         }


    protected function registerSite()
    {
        MySqlEmptyTableSite::$site = $this;
    }

    public function loadContent()
    {

        $tableParameter = new TableParameter();

        $table = new DataDelete();
        $table->tableName = $tableParameter->getValue();
        $table->delete();

        (new UrlReferer())->redirect();


    }


}