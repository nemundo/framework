<?php

namespace Nemundo\Admin\AppDesigner\Site;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\App\AppReader;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Admin\AppDesigner\Site\App\AppDeleteSite;
use Nemundo\Admin\AppDesigner\Site\App\AppEditSite;
use Nemundo\Admin\AppDesigner\Site\App\AppNewSite;
use Nemundo\Admin\AppDesigner\Site\App\AppSite;
use Nemundo\Admin\AppDesigner\Site\App\AppTrashSite;
use Nemundo\Admin\AppDesigner\Site\Image\AppModelImageFieldSite;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Package\Bootstrap\Table\BootstrapLabelValueTable;
use Nemundo\Web\Site\AbstractSite;

class AppDesignerSite extends AbstractSite
{

    /**
     * @var AppDesignerSite
     */
    public static $site;

    /**
     * @var AppSite
     */
    public $app;

    /**
     * @var AppNewSite
     */
    public $appNew;

    /**
     * @var AppEditSite
     */
    public $appEdit;

    /**
     * @var AppDeleteSite
     */
    public $appDelete;

    /**
     * @var AppTrashSite
     */
    public $trash;

    /**
     * @var AppModelImageFieldSite
     */
    public $image;

    protected function loadSite()
    {

        $this->title = 'App Designer';
        $this->url = 'app-designer';

        $this->app = new AppSite($this);
        $this->appNew = new AppNewSite($this);
        $this->appEdit = new AppEditSite($this);
        $this->appDelete = new AppDeleteSite($this);
        $this->trash = new AppTrashSite($this);
        $this->image = new AppModelImageFieldSite($this);

        AppDesignerConfig::$site = $this;
        AppDesignerSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        new AppDesignerBreadcrumb($page);


        $table = new BootstrapLabelValueTable($page);
        $table->smallTable = true;
        $table->addLabelValue('Project', AppDesignerConfig::$defaultProject->project);
        $table->addLabelValue('Namespace', AppDesignerConfig::$defaultProject->namespace);
        $table->addLabelValue('Path', AppDesignerConfig::$defaultProject->path);
        $table->addLabelValue('Db Filename', AppDesignerConfig::$defaultProject->dbFilename);

        $btn = new AdminSiteButton($page);
        $btn->content = 'New App';
        $btn->site = $this->appNew;


        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('App');
        $header->addText('Prefix');
        $header->addText('Namespace');
        $header->addEmpty();
        $header->addEmpty();

        $appReader = new AppReader();
        $appReader->connection = new AppDesignerConnection();
        $appReader->filter->andEqual($appReader->model->active, true);

        foreach ($appReader->getData() as $appRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($appRow->appName);
            $row->addText($appRow->appPrefix);
            $row->addText($appRow->appNamespace);

            $site = clone($this->appEdit);
            $site->addParameter(new AppParameter($appRow->id));
            $row->addIconSite($site);

            $site = clone($this->appDelete);
            $site->addParameter(new AppParameter($appRow->id));
            $row->addIconSite($site);

            $site = clone($this->app->appModel);
            $site->addParameter(new AppParameter($appRow->id));
            $row->addClickableSite($site);

        }

        $page->render();

    }

}