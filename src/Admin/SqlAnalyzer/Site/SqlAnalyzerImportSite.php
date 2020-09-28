<?php

namespace Nemundo\Admin\SqlAnalyzer\Site;


use Nemundo\Admin\SqlAnalyzer\Import\SqlAnalyzerImport;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;

class SqlAnalyzerImportSite extends AbstractSite
{

    /**
     * @var SqlAnalyzerImportSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'sql-analyzer-import';
        $this->menuActive = false;
    }

    protected function registerSite()
    {
        SqlAnalyzerImportSite::$site = $this;
    }


    public function loadContent()
    {

        (new SqlAnalyzerImport())->importSql();
        (new UrlReferer())->redirect();

    }

}