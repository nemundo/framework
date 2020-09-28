<?php

namespace Nemundo\Admin\MySql\Site\Action;


use Nemundo\Admin\MySql\Parameter\TableParameter;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;

use Nemundo\Web\Url\UrlReferer;

// DropTableSite
class MySqlDropTableSite extends AbstractIconSite
{

    /**
     * @var MySqlDropTableSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Drop Table';
        $this->url = 'drop-table';
        $this->icon = new DeleteIcon();
        $this->menuActive = false;
      }


    protected function registerSite()
    {
        $this::$site = $this;
    }

    public function loadContent()
    {

        $tableParameter = new TableParameter();

        $table = new MySqlTable();
        $table->tableName = $tableParameter->getValue();
        $table->dropTable();

        (new UrlReferer())->redirect();

    }

}