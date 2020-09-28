<?php

namespace Nemundo\Admin\SqlAnalyzer\Model;

use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\Number\NumberOrmType;
use Nemundo\Orm\Type\Text\LargeTextOrmType;
use Nemundo\Orm\Type\Text\TextOrmType;

class SqlAnalyzerOrmModel extends AbstractOrmModel
{

    /**
     * @var LargeTextOrmType
     */
    public $sqlQuery;

    /**
     * @var TextOrmType
     */
    public $sqlTableName;

    /**
     * @var TextOrmType
     */
    public $sqlSelectType;

    /**
     * @var TextOrmType
     */
    public $sqlKey;

    /**
     * @var NumberOrmType
     */
    public $sqlRows;

    /**
     * @var TextOrmType
     */
    public $sqlExtra;


    protected function loadModel()
    {

        $this->tableName = 'admin_sql_analyzer';
        $this->className = 'SqlAnalyzer';
        $this->namespace = 'Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer';

        $this->sqlQuery = new ExternalOrmType($this);
        $this->sqlQuery->fieldName = 'sql_query';
        $this->sqlQuery->variableName = 'sqlQuery';
        $this->sqlQuery->externalModelClassName = SqlAnalyzerQueryOrmModel::class;

        $this->sqlTableName = new TextOrmType($this);
        $this->sqlTableName->fieldName = 'table_name';
        $this->sqlTableName->variableName = 'sqlTableName';

        $this->sqlSelectType = new TextOrmType($this);
        $this->sqlSelectType->fieldName = 'select_type';
        $this->sqlSelectType->variableName = 'sqlSelectType';

        $this->sqlKey = new TextOrmType($this);
        $this->sqlKey->fieldName = 'key';
        $this->sqlKey->variableName = 'sqlKey';

        $this->sqlRows = new NumberOrmType($this);
        $this->sqlRows->fieldName = 'rows';
        $this->sqlRows->variableName = 'sqlRows';

        $this->sqlExtra = new TextOrmType($this);
        $this->sqlExtra->fieldName = 'extra';
        $this->sqlExtra->variableName = 'sqlExtra';

    }

}