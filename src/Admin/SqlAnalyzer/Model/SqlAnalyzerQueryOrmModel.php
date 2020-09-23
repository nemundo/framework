<?php

namespace Nemundo\Admin\SqlAnalyzer\Model;

use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\Number\DecimalNumberOrmType;
use Nemundo\Orm\Type\Number\NumberOrmType;
use Nemundo\Orm\Type\Text\LargeTextOrmType;

class SqlAnalyzerQueryOrmModel extends AbstractOrmModel
{

    /**
     * @var LargeTextOrmType
     */
    public $sqlQuery;

    /**
     * @var NumberOrmType
     */
    public $sqlResultRows;

    /**
     * @var DecimalNumberOrmType
     */
    public $sqlTime;

    protected function loadModel()
    {

        $this->tableName = 'admin_sql_analyzer_query';
        $this->className = 'SqlAnalyzerQuery';
        $this->namespace = 'Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery';

        $this->sqlQuery = new LargeTextOrmType($this);
        $this->sqlQuery->fieldName = 'sql_query';
        $this->sqlQuery->variableName = 'sqlQuery';

        $this->sqlResultRows = new NumberOrmType($this);
        $this->sqlResultRows->fieldName = 'result_rows';
        $this->sqlResultRows->variableName = 'sqlResultRows';

        $this->sqlTime = new DecimalNumberOrmType($this);
        $this->sqlTime->fieldName = 'time';
        $this->sqlTime->variableName = 'sqlTime';

    }

}