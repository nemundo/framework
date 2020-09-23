<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\Data;


use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\MySql\Table\MySqlDataTable;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Count\DataCount;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Web\Site\AbstractSite;

class AppModelDataSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Data';
        $this->url = 'model-data';
        $this->menuActive = false;

        new AppModelDataEmptySite($this);

    }


    public function loadContent()
    {

        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $modelRow = $factory->getModelRow();

        $page = new AdminTemplate();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addApp($modelRow->app);
        $breadcrumb->addModel($modelRow);
        $breadcrumb->addActiveItem('Data');

        $btn = new AdminSiteButton($page);
        //$btn->content = 'Empty Data';
        $btn->site = AppModelDataEmptySite::$site;
        $btn->site->addParameter(new ModelParameter($modelRow->id));


        $table = new MySqlTable($modelRow->modelTableName);
        if ($table->existsTable()) {

            $count = new DataCount();
            $count->tableName = $modelRow->modelTableName;
            $p = new Paragraph($page);
            $p->content = (new Number($count->getCount()))->formatNumber() . ' Rows';

            $data = new MySqlDataTable($page);
            $data->tableName = $modelRow->modelTableName;
            $data->limit = 100;

        } else {

            $p = new Paragraph($page);
            $p->content = 'Table does not exist';

        }

        $page->render();

    }

}