<?php

namespace Nemundo\App\MySql\Page;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\MySql\Com\ListBox\MySqlTableListBox;
use Nemundo\App\MySql\Com\Table\MySqlDataTable;
use Nemundo\App\MySql\Com\Table\MySqlIndexTable;
use Nemundo\App\MySql\Com\Table\MySqlTableFieldTable;
use Nemundo\App\MySql\Com\Table\MySqlTableTable;
use Nemundo\App\MySql\Parameter\TableParameter;
use Nemundo\App\MySql\Site\Action\DropTableSite;
use Nemundo\App\MySql\Site\Action\EmptyTableSite;
use Nemundo\App\MySql\Template\MySqlTemplate;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Reader\SqlReader;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class MySqlTablePage extends MySqlTemplate
{

    public function getContent()
    {


        $table=new MySqlTableFieldTable($this);
        $table->tableName=(new TableParameter())->getValue();

        return parent::getContent();
    }
}