<?php

namespace Nemundo\Admin\SqlAnalyzer\Collection;


use Nemundo\Admin\SqlAnalyzer\Model\SqlAnalyzerOrmModel;
use Nemundo\Admin\SqlAnalyzer\Model\SqlAnalyzerQueryOrmModel;
use Nemundo\Model\Collection\AbstractModelCollection;

class SqlAnalyzerOrmCollection extends AbstractModelCollection
{

    protected function loadCollection()
    {

        $this->addModel(new SqlAnalyzerQueryOrmModel());
        $this->addModel(new SqlAnalyzerOrmModel());

    }

}