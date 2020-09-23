<?php

namespace Nemundo\Admin\SqLite\Site;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\SqLite\Com\SqLiteDataTable;
use Nemundo\Admin\SqLite\Com\SqLiteTableListBox;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Web\Site\AbstractSite;

class SqLiteSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'SqLite';
        $this->url = 'sqlite';
    }


    public function loadContent()
    {

        $connection = new AppDesignerConnection();

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = 'Sqlite';


        $form = new SearchForm($page);

        $formRow = new BootstrapFormRow($form);

        $list = new SqLiteTableListBox($formRow);
        $list->connection = $connection;
        $list->submitOnChange = true;


        $tableName = $list->getValue();
        if ($tableName !== '') {

            $data = new SqLiteDataTable($page);
            $data->connection = $connection;
            $data->tableName = $tableName;


        }


        $page->render();

    }

}