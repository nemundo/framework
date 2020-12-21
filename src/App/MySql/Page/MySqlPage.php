<?php

namespace Nemundo\App\MySql\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Admin\MySql\Form\MySqlDatabaseForm;
use Nemundo\App\MySql\Com\ListBox\MySqlTableListBox;
use Nemundo\App\MySql\Com\Table\MySqlDataTable;
use Nemundo\App\MySql\Com\Table\MySqlTableFieldTable;
use Nemundo\App\MySql\Com\Table\MySqlTableTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Provider\MySql\Connection\MySqlConnection;
use Nemundo\Db\Provider\MySql\Database\MySqlDatabaseReader;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\MySql\Com\Form\SqlFileImportForm;
use Nemundo\MySql\Connection\SessionConnection;
use Nemundo\MySql\Parameter\DatabaseParameter;
use Nemundo\MySql\Site\DatabaseDeleteSite;
use Nemundo\MySql\Site\DatabaseSite;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class MySqlPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $form=new SearchForm($this);

        $formRow=new BootstrapFormRow($form);

        $table=new MySqlTableListBox($formRow);
        $table->submitOnChange=true;
        $table->searchMode=true;

        if ($table->hasValue()) {

            $data=new MySqlTableFieldTable($this);
            $data->tableName=$table->getValue();

            $data=new MySqlDataTable($this);
            $data->tableName=$table->getValue();

        }




        /*
        $p = new Paragraph($this);
        $p->content = 'MySql';

        //$p=new Paragraph($this);
        //$p->content='Tmp Path: '.(new TmpPath())->getPath();


        //new SqlFileImportForm($this);



        /*
        $layout=new BootstrapTwoColumnLayout($this);


        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Database');
        $header->addEmpty();


        $reader = new MySqlDatabaseReader();
        $reader->connection =  new SessionConnection();
        foreach ($reader->getData() as $database) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($database->databaseName);

            $site =clone(DatabaseSite::$site);
            $site->addParameter(new DatabaseParameter($database->databaseName));
            $row->addClickableSite($site);


            $site=clone(DatabaseDeleteSite::$site);
            $site->addParameter(new DatabaseParameter($database->databaseName));
            $row->addIconSite($site);

        }


        DbConfig::$defaultConnection =  new SessionConnection();


        $widget=new AdminWidget($layout->col2);
        $widget->widgetTitle='Create Database';

        new MySqlDatabaseForm($widget);*/


        return parent::getContent();
    }
}