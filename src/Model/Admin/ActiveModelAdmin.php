<?php

namespace Nemundo\Model\Admin;


use Nemundo\Model\Admin\Redirect\ModelActiveRedirect;
use Nemundo\Model\Admin\Redirect\ModelInactiveRedirect;
use Nemundo\Model\Data\ModelUpdate;
use Nemundo\Model\Table\ActiveModelPaginationTable;
use Nemundo\Model\Template\AbstractActiveModel;
use Nemundo\Web\Action\ActionSite;
use Nemundo\Web\Parameter\UrlParameter;


class ActiveModelAdmin extends AbstractModelAdmin
{

    /**
     * @var AbstractActiveModel
     */
    public $model;

    /**
     * @var ActionSite
     */
    protected $active;

    /**
     * @var ActionSite
     */
    protected $inactive;


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->showDeleteButton = false;
        $this->table = new ActiveModelPaginationTable();

    }


    protected function loadActionSite()
    {

        parent::loadActionSite();

        $this->active = new ActionSite($this);
        $this->active->actionName = 'activate';
        $this->active->onAction = function () {

            $parameter = new UrlParameter();
            $parameter->parameterName = 'id';

            $update = new ModelUpdate();
            $update->model = $this->model;
            $update->typeValueList->setModelValue($this->model->active, true);
            $update->updateById($parameter->getValue());

            $this->index->removeParameter($parameter);
            $this->index->redirect();

        };


        $this->inactive = new ActionSite($this);
        $this->inactive->actionName = 'inactive';
        $this->inactive->onAction = function () {

            $parameter = new UrlParameter();
            $parameter->parameterName = 'id';

            $update = new ModelUpdate();
            $update->model = $this->model;
            $update->typeValueList->setModelValue($this->model->active, false);
            $update->updateById($parameter->getValue());

            $this->index->removeParameter($parameter);
            $this->index->redirect();

        };

        $redirect = new ModelActiveRedirect();
        $redirect->url = $this->active;
        $redirect->parameterField = $this->model->id;
        $this->table->addRedirectHyperlink($redirect);

        $redirect = new ModelInactiveRedirect();
        $redirect->url = $this->inactive;
        $redirect->parameterField = $this->model->id;
        $this->table->addRedirectHyperlink($redirect);

        $this->model->active->visible->table = false;

    }

}