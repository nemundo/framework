<?php

namespace Nemundo\Admin\AppDesigner\Site\App;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Navigation\AppDesignerNavigation;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Admin\AppDesigner\Site\Creator\ParameterCreatorSite;
use Nemundo\Admin\AppDesigner\Site\Creator\SiteCreatorSite;
use Nemundo\Admin\AppDesigner\Site\Creator\UsergroupCreatorSite;
use Nemundo\Admin\AppDesigner\Site\Model\AppModelSite;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;


class AppSite extends AbstractSite
{

    /**
     * @var AppModelSite
     */
    public $appModel;

    /**
     * @var SiteCreatorSite
     */
    public $siteCreator;

    /**
     * @var UsergroupCreatorSite
     */
    public $usergroupCreator;

    /**
     * @var ParameterCreatorSite
     */
    public $parameterCreator;


    protected function loadSite()
    {
        $this->title = 'App';
        $this->url = 'app';
        $this->menuActive = false;

        $this->appModel = new AppModelSite($this);
        $this->siteCreator = new SiteCreatorSite($this);
        $this->usergroupCreator = new UsergroupCreatorSite($this);
        $this->parameterCreator = new ParameterCreatorSite($this);

    }


    public function loadContent()
    {

        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $appRow = $factory->getAppRow();

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $breadcrumb = new AppDesignerBreadcrumb($page);
        $breadcrumb->addApp($appRow);

        new AppDesignerNavigation($page);

        $table = new AdminLabelValueTable($page);
        $table->addLabelValue('App', $appRow->appName);
        $table->addLabelValue('Namespace', $appRow->appNamespace);

        $btn = new AdminSiteButton($page);
        //$btn->content = 'edit';
        $btn->site = clone(AppDesignerConfig::$site->appEdit);
        $btn->site->addParameter(new AppParameter($appRow->id));

        $page->render();

    }

}