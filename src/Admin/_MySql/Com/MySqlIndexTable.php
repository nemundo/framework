<?php

namespace Nemundo\Admin\MySql\Com;


use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Provider\MySql\Index\MySqlIndexReader;
use Nemundo\Package\Bootstrap\Table\BootstrapTable;

class MySqlIndexTable extends BootstrapTable
{

    /**
     * @var string
     */
    public $tableName;

    public function getContent()
    {

        $header = new TableHeader($this);
        $header->addText('Type');
        $header->addText('Field');

        $indexReader = new MySqlIndexReader();
        $indexReader->tableName = $this->tableName;
        foreach ($indexReader->getData() as $index) {
            $row = new TableRow($this);
            $row->addText($index->getValue('index_type'));
            $row->addText($index->getValue('column_name'));
        }

        return parent::getContent();
    }


}