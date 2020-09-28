<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\Index;


use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelIndexField\AppModelIndexFieldReader;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Parameter\ModelIndexFieldParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelIndexParameter;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class AppModelIndexSite extends AbstractSite
{

    /**
     * @var AppModelIndexSite
     */
    public static $site;

    /**
     * @var AppModelIndexFieldNewSite
     */
    private $new;

    /**
     * @var AppModelIndexFieldDeleteSite
     */
    private $delete;

    protected function loadSite()
    {
        $this->url = 'index';
        $this->menuActive = false;

        $this->new = new AppModelIndexFieldNewSite($this);
        $this->delete = new AppModelIndexFieldDeleteSite($this);

    }


    protected function registerSite()
    {
        AppModelIndexSite::$site = $this;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $indexRow = $factory->getModelIndexRow();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addApp($indexRow->appModel->app);
        $breadcrumb->addModel($indexRow->appModel);

        $layout = new BootstrapTwoColumnLayout($page);

        $title = new AdminTitle($layout->col1);
        $title->content = 'Index: ' . $indexRow->appModel->modelLabel;

        $btn = new AdminSiteButton($layout->col1);
        $btn->content = 'New Index Field';
        $btn->site = $this->new;
        $btn->site->addParameter(new ModelIndexParameter($indexRow->id));

        $table = new AdminTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Field');
        $header->addEmpty();

        $fieldReader = new AppModelIndexFieldReader();
        $fieldReader->connection = $conn;
        $fieldReader->filter->andEqual($fieldReader->model->appIndexId, $indexRow->id);

        foreach ($fieldReader->getData() as $fieldRow) {

            $row = new TableRow($table);
            $row->addText($fieldRow->appField->appFieldLabel);

            $site = clone($this->delete);
            $site->addParameter(new ModelIndexFieldParameter($fieldRow->id));
            $row->addIconSite($site);

        }

        $page->render();

    }
}