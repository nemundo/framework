<?php

namespace Nemundo\Admin\MySql\Com;



use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\MySql\Form\MySqlTableFieldForm;
use Nemundo\Admin\MySql\Form\MySqlTableForm;
use Nemundo\Admin\MySql\Parameter\FieldParameter;
use Nemundo\Admin\MySql\Parameter\TableParameter;


use Nemundo\Admin\MySql\Table\MySqlDataTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Html\Heading\H3;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Connection\AbstractConnection;
use Nemundo\Db\Delete\DataDelete;
use Nemundo\Db\Provider\MySql\Field\MySqlField;
use Nemundo\Db\Provider\MySql\Field\MySqlTableFieldReader;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Package\Bootstrap\Button\BootstrapButton;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;

use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Web\Action\ActionUrl;



// pull down für table
// data

class MySqlAdmin extends AbstractActionPanel
{

    /**
     * @var AbstractConnection
     */
    public $connection;

    /**
     * @var ActionUrl
     */
    private $index;

    /**
     * @var ActionUrl
     */
    private $data;

    /**
     * @var ActionUrl
     */
    private $newTable;

    /**
     * @var ActionUrl
     */
    private $newTableField;

    /**
     * @var ActionUrl
     */
    private $emptyTable;

    /**
     * @var ActionUrl
     */
    private $deleteTable;

    /**
     * @var ActionUrl
     */
    private $deleteTableField;


    /**
     * @var BootstrapColumn
     */
    private $colLeft;

    /**
     * @var BootstrapColumn
     */
    private $colRight;

    protected function loadActionSite()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapFormRow($form);

        $list = new MySqlTableListBox($formRow);
        $list->name = (new TableParameter())->getParameterName();
        $list->value = $list->getValue();
        $list->submitOnChange = true;
        $list->emptyValueAsDefault = true;

        $row = new BootstrapRow($this);

        /*$this->colLeft = new BootstrapColumn($row);
        $this->colLeft->columnWidth = 4;*/

        $this->colRight = new BootstrapColumn($row);
        $this->colRight->columnWidth = 12;


        $this->index = new ActionUrl($this);
        $this->index->onAction = function () {

            //$listbox = new MySqlDatabaseListBox($this);

            $btn = new BootstrapButton($this->colLeft);
            $btn->content = 'New Table';
            $btn->href = $this->newTable->getUrl();

            /*
            $list = new BootstrapHyperlinkList($this->colLeft);
            $reader = new MySqlTableReader();
            foreach ($reader->getData() as $mysqlTable) {

                $url = new Url();
                $url->setParameter('table', $mysqlTable->tableName);

                if ($mysqlTable->tableName == $this->getTableName()) {
                    $list->addActiveHyperlink($mysqlTable->tableName);
                } else {
                    $list->addHyperlink($mysqlTable->tableName, $url->getUrl());
                }


            }*/


            $tableParameter = new TableParameter();


            //if (HttpRequest::existsGet('table')) {
            if ($tableParameter->exists()) {

                $h3 = new H3($this->colRight);
                $h3->content = $this->getTableName();

                $url = $this->newTableField;
                //$url->addParameter('table', $this->getTableName());
                $url->addParameter($tableParameter->setValue($this->getTableName()));


                $btn = new BootstrapButton($this->colRight);
                $btn->content = 'New Table Field';
                $btn->href = $url->getUrl();


                // Structure
                $fieldReader = new MySqlTableFieldReader();
                $fieldReader->tableName = $this->getTableName();


                $table = new AdminTable($this->colRight);

                $header = new TableHeader($table);
                $header->addText('Name');
                $header->addText('Type');
                $header->addText('Length');
                $header->addEmpty();


                foreach ($fieldReader->getData() as $field) {

                    $row = new TableRow($table);
                    $row->addText($field->fieldName);
                    $row->addText($field->fieldType);
                    $row->addText($field->fieldTypeLength);

                    $url = $this->deleteTableField;
                    //$url->addParameter('field', $field->fieldName);
                    $url->addParameter((new FieldParameter())->setValue($field->fieldName));
                    $row->addHyperlink($url->getUrl(), 'delete');

                }


                $index = new MySqlIndexTable($this->colRight);
                $index->tableName = $this->getTableName();


                $tableParameter = new TableParameter();
                $tableParameter->setValue($this->getTableName());

                $button = new BootstrapButton($this->colRight);
                $button->content = 'Data';
                $url = $this->data;
                $url->addParameter($tableParameter);
                $button->href = $url->getUrl();

                /*
                $button = new AdminSiteButton($this->colRight);
                $button->content = 'Csv Export';
                $button->site = clone(CsvExportSite::$site);
                $button->site->addParameter($tableParameter);

                $button = new AdminSiteButton($this->colRight);
                $button->content = 'Excel Export';
                $button->site = clone(ExcelExportSite::$site);
                $button->site->addParameter($tableParameter);


                /*
                $button = new AdminSiteButton($this->colRight);
                $button->content = 'Empty Table';
                $url = $this->emptyTable;
                $url->addParameter($tableParameter);
                $button->url = $url->getUrl();

                $button = new AdminSiteButton($this->colRight);
                $button->content = 'Drop Table';
                $url = $this->deleteTable;
                $url->addParameter($tableParameter);
                $button->url = $url->getUrl();*/


                $table = new MySqlDataTable($this->colRight);
                $table->tableName = $this->getTableName();
                $table->limit = 100;


            }

        };

        $this->data = new ActionUrl($this);
        $this->data->actionName = 'data';
        $this->data->onAction = function () {

            $h3 = new H3($this->colRight);
            $h3->content = $this->getTableName();

            $table = new MySqlDataTable($this->colRight);
            $table->tableName = $this->getTableName();

        };


        // New Table
        $this->newTable = new ActionUrl($this);
        $this->newTable->actionName = 'new-table';
        $this->newTable->onAction = function () {

            $form = new MySqlTableForm($this);
            //$form->redirectUrl = $this->index->getUrl();

        };

        // Empty Table
        $this->emptyTable = new ActionUrl($this);
        $this->emptyTable->actionName = 'empty-table';
        $this->emptyTable->onAction = function () {

            $table = new DataDelete();
            $table->tableName = $this->getTableName();
            $table->delete();

            //$this->index->removeParameter('table');
            $this->index->redirect();


        };


        // Delete Table
        $this->deleteTable = new ActionUrl($this);
        $this->deleteTable->actionName = 'delete-table';
        $this->deleteTable->onAction = function () {

            $table = new MySqlTable();
            $table->tableName = $this->getTableName();
            $table->dropTable();

            //$this->index->removeParameter('table');
            $this->index->redirect();


        };


        // New Table Field
        $this->newTableField = new ActionUrl($this);
        $this->newTableField->actionName = 'new-table-field';
        $this->newTableField->onAction = function () {

            //$tableName = HttpRequest::get('table');

            $tableParameter = new TableParameter();

            $form = new MySqlTableFieldForm($this);
            $form->tableName = $tableParameter->getValue();  // $tableName;

            $url = $this->index;
            //$url->addParameter('table', $tableName);
            $url->addParameter($tableParameter);

            //$form->redirectUrl = $url->getUrl();

        };

        // Delete Table Field
        $this->deleteTableField = new ActionUrl($this);
        $this->deleteTableField->actionName = 'delete-table-field';
        $this->deleteTableField->onAction = function () {

            $field = new MySqlField();
            $field->tableName = $this->getTableName();
            $field->fieldName = (new FieldParameter())->getValue();
            $field->dropField();

            $this->index->redirect();


        };


    }


    private function getTableName()
    {
        //$tableName = HttpRequest::get('table');
        $tableName = (new TableParameter())->getValue();
        return $tableName;
    }


}