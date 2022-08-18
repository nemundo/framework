<?php

namespace Nemundo\App\ModelDesigner\Page\Data;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\Data\DataEmptySite;
use Nemundo\App\ModelDesigner\Site\Data\DropDataSite;
use Nemundo\App\MySql\Com\Table\MySqlDataTable;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Count\DataCount;
use Nemundo\Db\Provider\MySql\Table\MySqlTable;
use Nemundo\Html\Paragraph\Paragraph;

class DataPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($app);

        $layout=new AdminFlexboxLayout($this);

        $breadcrumb = new ModelDesignerBreadcrumb($layout);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($app);
        $breadcrumb->addModel($model);
        $breadcrumb->addActiveItem('Data');


        $title = new AdminTitle($layout);
        $title->content = $model->tableName;


        $table = new MySqlTable($model->tableName);
        if ($table->existsTable()) {

            $btn = new AdminSiteButton($layout);
            $btn->site = DataEmptySite::$site;
            $btn->site->addParameter(new ProjectParameter());
            $btn->site->addParameter(new AppParameter());
            $btn->site->addParameter(new ModelParameter());

            $btn = new AdminSiteButton($layout);
            $btn->site = DropDataSite::$site;
            $btn->site->addParameter(new ProjectParameter());
            $btn->site->addParameter(new AppParameter());
            $btn->site->addParameter(new ModelParameter());


            $count = new DataCount();
            $count->tableName = $model->tableName;
            $p = new Paragraph($layout);
            $p->content = (new Number($count->getCount()))->getFormatNumber() . ' Rows';

            $data = new MySqlDataTable($layout);
            $data->tableName = $model->tableName;
            $data->limit = 100;



        } else {

            $p = new Paragraph($layout);
            $p->content = 'Table does not exist';

        }

        return parent::getContent();

    }

}