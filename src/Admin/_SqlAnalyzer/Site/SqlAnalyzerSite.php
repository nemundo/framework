<?php

namespace Nemundo\Admin\SqlAnalyzer\Site;


use Nemundo\Admin\SqlAnalyzer\Page\SqlAnalyzerPage;
use Nemundo\Web\Site\AbstractSite;

class SqlAnalyzerSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Sql Analyzer';
        $this->url = 'sql-analyzer';

        new SqlAnalyzerImportSite($this);

    }


    protected function registerSite()
    {
        //Sql  SqlAnalyzerConfig::$site = $this;
    }

    public function loadContent()
    {

        (new SqlAnalyzerPage())->render();

    }

}