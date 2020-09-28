<?php

namespace Nemundo\Admin\MySql\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Db\Provider\MySql\Field\MySqlTableFieldReader;
use Nemundo\Db\Reader\DataReader;

class MySqlDataTable extends AdminTable
{

    use ConnectionTrait;

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var int
     */
    public $limit;

    /**
     * @var bool
     */
    public $hideIdField = false;


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->loadConnection();
    }

    public function getContent()
    {

        if (!$this->checkProperty('tableName')) {
            return;
        }

        $fieldReader = new MySqlTableFieldReader();
        $fieldReader->connection = $this->connection;
        $fieldReader->tableName = $this->tableName;

        $header = new TableHeader($this);
        foreach ($fieldReader->getData() as $field) {
            $header->addText($field->fieldName);
        }

        $reader = new DataReader();
        $reader->connection = $this->connection;
        $reader->tableName = $this->tableName;
        $reader->limit = $this->limit;

        foreach ($reader->getData() as $item) {
            $row = new TableRow($this);
            foreach ($fieldReader->getData() as $field) {

                $value = $item->getValue($field->fieldName);

                if ($value == null) {
                    $value = '(NULL)';
                }

                // html decode

                $row->addText($value);

            }
        }

        return parent::getContent();

    }

}