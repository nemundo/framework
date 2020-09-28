<?php

namespace Nemundo\Model\Admin;


use Nemundo\Admin\Com\Button\AdminUrlButton;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Core\Http\Request\Get\GetRequest;
use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Db\Filter\Filter;
use Nemundo\Model\Admin\Parameter\AdminUrlParameter;
use Nemundo\Model\Admin\Redirect\ModelDeleteRedirect;
use Nemundo\Model\Admin\Redirect\ModelEditRedirect;
use Nemundo\Model\Admin\Redirect\ModelViewRedirect;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Delete\ModelDelete;
use Nemundo\Model\Form\ModelForm;
use Nemundo\Model\Form\ModelFormUpdate;
use Nemundo\Model\Table\ActiveModelPaginationTable;
use Nemundo\Model\Table\ModelPaginationTable;
use Nemundo\Model\View\ModelView;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Web\Action\ActionSite;


abstract class AbstractModelAdmin extends AbstractActionPanel
{

    use ConnectionTrait;

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var bool
     */
    public $showTitle = true;

    /**
     * @var bool
     */
    public $showNewButton = true;

    /**
     * @var bool
     */
    public $showViewButton = true;

    /**
     * @var bool
     */
    public $showEditButton = true;

    /**
     * @var bool
     */
    public $showDeleteButton = true;

    /**
     * @var ModelPaginationTable
     */
    public $table;

    /**
     * @var ActionSite
     */
    protected $index;

    /**
     * @var ActionSite
     */
    protected $new;

    /**
     * @var ActionSite
     */
    protected $edit;

    /**
     * @var ActionSite
     */
    protected $delete;

    /**
     * @var ActionSite
     */
    protected $view;

    protected $formClass;

    protected $tableClass;

    /**
     * @var BootstrapColumn
     */
    private $col;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->loadConnection();
        $this->filter = new Filter();
        $this->table = new ModelPaginationTable();

    }


    protected function loadActionSite()
    {

        $row = new BootstrapColumn($this);
        $this->col = new BootstrapColumn($row);

        if ($this->showTitle) {
            $title = new AdminSubtitle($this->col);
            $title->content = $this->model->getLabel();
        }

        // Index
        $this->index = new ActionSite($this);
        $this->index->onAction = function () {

            if ($this->showNewButton) {
                $newButton = new  AdminUrlButton($this->col);
                $newButton->content = 'Neu';
                $newButton->url = $this->new->getUrl();
            }

            $this->table->model = $this->model;
            $this->table->paginationReader->connection = $this->connection;
            $this->table->paginationReader->filter = $this->filter;

            if ($this->showViewButton) {
                $redirect = new ModelViewRedirect();
                $redirect->url = $this->view;
                $redirect->parameterField = $this->model->id;
                $this->table->addRedirectHyperlink($redirect);
            }


            if ($this->showEditButton) {
                $editRedirect = new ModelEditRedirect();
                $editRedirect->url = $this->edit;
                $editRedirect->parameterField = $this->model->id;
                $this->table->addRedirectHyperlink($editRedirect);
            }

            if ($this->showDeleteButton) {
                $deleteRedirect = new ModelDeleteRedirect();
                $deleteRedirect->url = $this->delete;
                $deleteRedirect->parameterField = $this->model->id;
                $this->table->addRedirectHyperlink($deleteRedirect);
            }

            $this->col->addContainer($this->table);

            $pagination = new BootstrapPagination($this->col);
            $pagination->paginationReader = $this->table->paginationReader;

        };

        $this->loadNewActionUrl();
        $this->loadEditActionUrl();
        $this->loadViewActionUrl();
        $this->loadDeleteActionUrl();

    }


    protected function loadNewActionUrl()
    {

        $this->new = new ActionSite($this);
        $this->new->actionName = $this->model->tableName . '-new';
        $this->new->onAction = function () {
            $form = new ModelForm($this->col);
            $form->model = $this->model;
            $form->connection = $this->connection;
            $form->redirectSite = $this->index;
        };

    }


    protected function loadEditActionUrl()
    {

        $this->edit = new ActionSite($this);
        $this->edit->actionName = $this->model->tableName . '-edit';
        $this->edit->onAction = function () {

            $form = new ModelFormUpdate($this->col);
            $form->model = $this->model;
            $form->connection = $this->connection;
            $form->updateId = (new AdminUrlParameter())->getValue();

            $this->index->removeParameter(new AdminUrlParameter());
            $form->redirectSite = $this->index;

        };

    }


    protected function loadViewActionUrl()
    {

        $this->view = new ActionSite($this);
        $this->view->actionName = $this->model->tableName . '-view';
        $this->view->onAction = function () {

            $view = new ModelView($this);
            $view->model = $this->model;
            $view->connection = $this->connection;

            $parameter = new GetRequest('id');
            $view->dataId = $parameter->getValue();

        };

    }


    protected function loadDeleteActionUrl()
    {

        $this->delete = new ActionSite($this);
        $this->delete->actionName = $this->model->tableName . '-delete';
        $this->delete->onAction = function () {

            $deleteData = new ModelDelete();
            $deleteData->model = $this->model;
            $deleteData->connection = $this->connection;
            $deleteData->filter->andEqual($this->model->id, (new AdminUrlParameter())->getValue());
            $deleteData->delete();

            $this->index->removeParameter(new AdminUrlParameter());

            $this->index->redirect();

        };

    }

}