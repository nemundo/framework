<?php

namespace Nemundo\Admin\SqlAnalyzer\Collection;


use Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer\SqlAnalyzerModel;
use Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery\SqlAnalyzerQueryModel;
use Nemundo\Model\Collection\AbstractModelCollection;

class SqlAnalyzerCollection extends AbstractModelCollection
{

    protected function loadCollection()
    {

        $this->addModel(new SqlAnalyzerQueryModel());
        $this->addModel(new SqlAnalyzerModel());

    }

}