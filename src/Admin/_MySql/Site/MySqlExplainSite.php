<?php

namespace Nemundo\Admin\MySql\Site;


use Nemundo\Admin\MySql\Navigation\MySqlNavigation;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Provider\MySql\Explain\MySqlExplain;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Form\BootstrapSearchForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\Table\BootstrapTable;

use Nemundo\Web\Site\AbstractSite;

class MySqlExplainSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'MySql Explain';
        $this->url = 'mysql-explain';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();
        new MySqlNavigation($page);

        $form = new BootstrapSearchForm($page);

        $sql = new BootstrapLargeTextBox($form);
        $sql->name = 'sql';
        $sql->label = 'SQL';
        $sql->autofocus = true;
        $sql->value = $sql->getValue();


        if ($sql->getValue() !== '') {

            $table = new BootstrapTable($page);

            $header = new TableHeader($table);
            $header->addText('Table Name');
            $header->addText('Key');
            $header->addText('Extra');
            $header->addText('Rows');
            $header->addText('Select Type');

            $explain = new MySqlExplain();
            $explain->sql = $sql->getValue();

            foreach ($explain->getExplain() as $explainTable) {

                $row = new TableRow($table);
                $row->addText($explainTable->tableName);
                $row->addText($explainTable->key);
                $row->addText($explainTable->extra);
                $row->addText($explainTable->rows);
                $row->addText($explainTable->selectType);

            }

        }

        $page->render();

    }

}