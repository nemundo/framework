<?php

namespace Nemundo\Admin\MySql\Site;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\DbConfig;
use Nemundo\Db\Reader\SqlReader;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class MySqlTableSizeSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'MySql Table Size';
        $this->url = 'table-size';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;


        $layout = new BootstrapTwoColumnLayout($page);


        $table = new AdminTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Table');
        $header->addText('Engine');
        $header->addText('Row');
        $header->addText('Size');


        $sql = 'SELECT *, 
     ROUND(((data_length + index_length) / 1024 / 1024), 2) `size_mb` 
FROM information_schema.TABLES where table_Schema = "' . DbConfig::$defaultConnection->connectionParameter->database . '"
ORDER BY (data_length + index_length) DESC;';

        $sqlReader = new SqlReader();
        $sqlReader->sqlStatement->sql = $sql;

        foreach ($sqlReader->getData() as $sqlRow) {

            $rowCount = $sqlRow->getValue('table_rows');

            $row = new TableRow($table);
            $row->addText($sqlRow->getValue('table_name'));
            $row->addText($sqlRow->getValue('engine'));
            $row->addText((new Number($rowCount))->formatNumber());
            $row->addText($sqlRow->getValue('size_mb') . ' MB');

        }

        $page->render();

    }


}