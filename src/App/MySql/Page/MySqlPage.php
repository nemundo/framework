<?php

namespace Nemundo\App\MySql\Page;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\App\MySql\Com\ListBox\MySqlTableListBox;
use Nemundo\App\MySql\Com\Table\MySqlDataTable;
use Nemundo\App\MySql\Com\Table\MySqlIndexTable;
use Nemundo\App\MySql\Com\Table\MySqlTableFieldTable;
use Nemundo\App\MySql\Parameter\TableParameter;
use Nemundo\App\MySql\Site\Action\DropTableSite;
use Nemundo\App\MySql\Site\Action\EmptyTableSite;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;

class MySqlPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $form = new SearchForm($this);

        $formRow = new BootstrapFormRow($form);

        $table = new MySqlTableListBox($formRow);
        $table->submitOnChange = true;
        $table->searchMode = true;

        if ($table->hasValue()) {

            $btn = new AdminSiteButton($this);
            $btn->site = clone(EmptyTableSite::$site);
            $btn->site->addParameter(new TableParameter());

            $btn = new AdminSiteButton($this);
            $btn->site = clone(DropTableSite::$site);
            $btn->site->addParameter(new TableParameter());


            $data = new MySqlTableFieldTable($this);
            $data->tableName = $table->getValue();

            /*$data = new MySqlTableFieldTable($this);
            $data->tableName = $table->getValue();*/

            $data = new MySqlIndexTable($this);
            $data->tableName = $table->getValue();

            $data = new MySqlDataTable($this);
            $data->tableName = $table->getValue();

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