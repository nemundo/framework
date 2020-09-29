<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\Data;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Db\Delete\DataDelete;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Http\Url\UrlReferer;

class AppModelDataEmptySite extends AbstractSite
{

    /**
     * @var AppModelDataEmptySite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Empty Data';
        $this->url = 'empty-data';
        $this->menuActive = false;
    }


    protected function registerSite()
    {
        AppModelDataEmptySite::$site = $this;
    }

    public function loadContent()
    {

        $conn = new AppDesignerConnection();
        $factory = new RowFactory();
        $factory->connection = $conn;
        $modelRow = $factory->getModelRow();

        $table = new DataDelete();
        $table->tableName = $modelRow->modelTableName;
        $table->delete();

        (new UrlReferer())->redirect();

    }

}