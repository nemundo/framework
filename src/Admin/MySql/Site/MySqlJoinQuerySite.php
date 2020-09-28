<?php

namespace Nemundo\Admin\MySql\Site;


use Nemundo\Admin\MySql\Navigation\MySqlNavigation;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\RegularExpression\RegularExpressionReader;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Form\BootstrapSearchForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\Table\BootstrapTable;
use Nemundo\Web\Site\AbstractSite;


class MySqlJoinQuerySite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Join Query';
        $this->url = 'mysql-query-anaylzer';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();
        new MySqlNavigation($page);

        $form = new BootstrapSearchForm($page);


        $sqlLargeTextBox = new BootstrapLargeTextBox($form);
        $sqlLargeTextBox->name = 'sql';
        $sqlLargeTextBox->label = 'SQL';
        $sqlLargeTextBox->autofocus = true;
        $sqlLargeTextBox->value = $sqlLargeTextBox->getValue();

        /*
        $sqlRequest = new GetRequest('sql');

        if ($sqlRequest->existsRequest()) {

            $sql = new Text($sqlLargeTextBox->getValue());


            $table = new BootstrapTable($page);

            $header = new TableHeader($table);
            $header->addText('Left Join Table Name');
            $header->addText('Alias Table Name');

            $regularExpression = new RegularExpressionReader();
            $regularExpression->regularExpression = 'LEFT JOIN `(.*?)`(.*?)ON';
            $regularExpression->text = $sql->getValue();

            foreach ($regularExpression->getData() as $regularExpressionRow) {
                $row = new TableRow($table);
                $row->addText($regularExpressionRow->getValue(0));
                $row->addText($regularExpressionRow->getValue(1));
            }


            $fieldSql = new Text($sql->getSubstring(6, $sql->getPosistion(' FROM ') - 5));


            $table = new BootstrapTable($page);

            $header = new TableHeader($table);
            $header->addText('Field Name');
            $header->addText('Alias Field Name');


            foreach ($fieldSql->split(',') as $fieldName) {

                $row = new TableRow($table);

                $fieldNameList = new Text($fieldName);
                $fieldNameList->trim();

                foreach ($fieldNameList->split(' ') as $name) {
                    $row->addText($name);
                }


            }


        }*/


        $page->render();

    }


}