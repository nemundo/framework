<?php

namespace Nemundo\Admin\AppDesigner\Site\Model;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Com\DefaultOrderTypeTable;
use Nemundo\Admin\AppDesigner\Com\DefaultTypeTable;
use Nemundo\Admin\AppDesigner\Com\FieldTypeSiteDropdown;
use Nemundo\Admin\AppDesigner\Com\ModelFieldTable;
use Nemundo\Admin\AppDesigner\Com\ModelHyperlinkList;
use Nemundo\Admin\AppDesigner\Com\ModelIndexTable;
use Nemundo\Admin\AppDesigner\Com\ModelInformationTable;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelId;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Navigation\AppDesignerNavigation;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Admin\AppDesigner\Site\Model\Data\AppModelDataSite;
use Nemundo\Admin\AppDesigner\Site\Model\DefaultOrderType\DefaultOrderTypeDeleteSite;
use Nemundo\Admin\AppDesigner\Site\Model\DefaultOrderType\DefaultOrderTypeNewSite;
use Nemundo\Admin\AppDesigner\Site\Model\DefaultType\DefaultTypeDeleteSite;
use Nemundo\Admin\AppDesigner\Site\Model\DefaultType\DefaultTypeNewSite;
use Nemundo\Admin\AppDesigner\Site\Model\Field\AppModelFieldDeleteSite;
use Nemundo\Admin\AppDesigner\Site\Model\Field\AppModelFieldEditSite;
use Nemundo\Admin\AppDesigner\Site\Model\Field\AppModelFieldNewSite;
use Nemundo\Admin\AppDesigner\Site\Model\Field\AppModelFieldSortableSite;
use Nemundo\Admin\AppDesigner\Site\Model\Index\AppModelIndexDeleteSite;
use Nemundo\Admin\AppDesigner\Site\Model\Index\AppModelIndexNewSite;
use Nemundo\Admin\AppDesigner\Site\Model\Index\AppModelIndexSite;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;

use Nemundo\Package\Bootstrap\Button\BootstrapButtonSize;
use Nemundo\Package\Bootstrap\Button\BootstrapSiteButton;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Web\Site\AbstractSite;

class AppModelSite extends AbstractSite
{

    /**
     * @var AppModelNewSite
     */
    public $modelNew;

    /**
     * @var AppModelEditSite
     */
    public $modelEdit;

    /**
     * @var AppModelDataSite
     */
    public $modelData;

    /**
     * @var AppModelAdminSite
     */
    public $modelAdmin;

    /**
     * @var AppModelDeleteSite
     */
    public $modelDelete;

    /**
     * @var AppModelFieldNewSite
     */
    public $fieldNew;

    /**
     * @var AppModelFieldEditSite
     */
    public $fieldEdit;

    /**
     * @var AppModelFieldDeleteSite
     */
    public $fieldDelete;

    /**
     * @var AppModelFieldSortableSite
     */
    public $fieldSortable;

    /**
     * @var AppModelIndexSite
     */
    public $modelIndex;

    /**
     * @var AppModelIndexNewSite
     */
    public $modelIndexNew;

    /**
     * @var AppModelIndexDeleteSite
     */
    public $modelIndexDelete;

    /**
     * @var DefaultTypeNewSite
     */
    public $modelDefaultTypeNew;

    /**
     * @var DefaultTypeDeleteSite
     */
    public $modelDefaultTypeDelete;

    /**
     * @var DefaultOrderTypeNewSite
     */
    public $modelDefaultOrderTypeNew;

    /**
     * @var DefaultOrderTypeDeleteSite
     */
    public $modelDefaultOrderTypeDelete;

    /**
     * @var
     */
    //public $modelActionNew;

    /**
     * @var
     */
    //public $modelActionDelete;


    protected function loadSite()
    {

        $this->title = 'Model';
        $this->url = 'model';

        $this->modelNew = new AppModelNewSite($this);
        $this->modelEdit = new AppModelEditSite($this);
        $this->modelData = new AppModelDataSite($this);
        $this->modelAdmin = new AppModelAdminSite($this);
        $this->modelDelete = new AppModelDeleteSite($this);

        $this->fieldNew = new AppModelFieldNewSite($this);
        $this->fieldEdit = new AppModelFieldEditSite($this);
        $this->fieldDelete = new AppModelFieldDeleteSite($this);
        $this->fieldSortable = new AppModelFieldSortableSite($this);

        $this->modelIndex = new AppModelIndexSite($this);
        $this->modelIndexNew = new AppModelIndexNewSite($this);
        $this->modelIndexDelete = new AppModelIndexDeleteSite($this);

        $this->modelDefaultTypeNew = new DefaultTypeNewSite($this);
        $this->modelDefaultTypeDelete = new DefaultTypeDeleteSite($this);

        $this->modelDefaultOrderTypeNew = new DefaultOrderTypeNewSite($this);
        $this->modelDefaultOrderTypeDelete = new DefaultOrderTypeDeleteSite($this);

        /*
        $this->modelActionNew = new  ModelActionNewSite($this);
        $this->modelActionDelete = new ModelActionDeleteSite($this);*/

    }


    public function loadContent()
    {

        $appId = (new AppParameter())->getValue();

        $modelParameter = new ModelParameter();
        $modelId = $modelParameter->getValue();

        $conn = new AppDesignerConnection();
        $modelRow = null;

        if (!$modelParameter->exists()) {
            $id = new AppModelId();
            $id->filter->andEqual($id->model->appId, $appId);
            $id->filter->andEqual($id->model->active, true);
            $id->addOrder($id->model->modelLabel);
            $id->connection = new $conn;
            $modelId = $id->getId();
        }

        if ($modelId !== '') {
            $factory = new RowFactory();
            $factory->connection = $conn;
            $modelRow = $factory->getModelRow($modelId);
            $modelId = $modelRow->id;
            $appId = $modelRow->appId;
        }

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $site = clone($this->modelNew);
        $site->addParameter(new AppParameter());

        $breadcrumb = new AppDesignerBreadcrumb($page);


        if ($modelRow !== null) {
            $breadcrumb->addApp($modelRow->app);
            $breadcrumb->addModel($modelRow);
        } else {
            $factory = new RowFactory();
            $factory->connection = $conn;
            $appRow = $factory->getAppRow($appId);
            $breadcrumb->addApp($appRow);
        }


        $menu = new AppDesignerNavigation($page);
        $menu->appId = $appId;


        $bootstrapRow = new BootstrapRow($page);

        $colLeft = new BootstrapColumn($bootstrapRow);
        $colLeft->columnWidth = 3;

        $colRight = new BootstrapColumn($bootstrapRow);
        $colRight->columnWidth = 9;

        $site = clone(AppDesignerConfig::$site->app->appModel->modelNew);
        $site->addParameter(new AppParameter($appId));

        $btn = new AdminSiteButton($colLeft);
        $btn->site = $site;

        $list = new ModelHyperlinkList($colLeft);
        $list->appId = $appId;
        $list->currentModelId = $modelId;

        if ($modelId !== '') {

            $table = new ModelInformationTable($colRight);
            $table->modelRow = $modelRow;

            $btn = new AdminSiteButton($colRight);
            $btn->content = 'Edit';
            $btn->site = clone($this->modelEdit);
            $btn->site->addParameter(new ModelParameter($modelRow->id));

            $btn = new AdminSiteButton($colRight);
            $btn->content = 'Data';
            $btn->site = clone($this->modelData);
            $btn->site->addParameter(new ModelParameter($modelRow->id));

            $btn = new AdminSiteButton($colRight);
            $btn->content = 'Admin';
            $btn->site = clone($this->modelAdmin);
            $btn->site->addParameter(new ModelParameter($modelRow->id));

            $btn = new AdminSiteButton($colRight);
            $btn->content = 'Delete Model';
            $btn->site = clone($this->modelDelete);
            $btn->site->addParameter(new ModelParameter($modelRow->id));

            $dropdown = new FieldTypeSiteDropdown($colRight);
            $dropdown->modelId = $modelId;

            $table = new ModelFieldTable($colRight);
            $table->connection = new $conn;
            $table->modelId = $modelRow->id;

            // Index
            $btn = new AdminSiteButton($colRight);
            $btn->content = 'New Index';
            $site = clone(AppDesignerConfig::$site->app->appModel->modelIndexNew);
            $site->addParameter(new ModelParameter($modelRow->id));
            $btn->site = $site;

            $table = new ModelIndexTable($colRight);
            $table->connection = new $conn;
            $table->modelId = $modelRow->id;

            // Default Type
            $table = new DefaultTypeTable($colRight);
            $table->modelId = $modelRow->id;

            // Default Order Type
            $table = new DefaultOrderTypeTable($colRight);
            $table->modelId = $modelRow->id;

            // Action
            //$table = new ActionTable($colRight);
            //$table->modelId = $modelRow->id;

        }

        $page->render();

    }

}