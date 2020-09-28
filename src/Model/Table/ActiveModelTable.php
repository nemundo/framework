<?php

namespace Nemundo\Model\Table;


use Nemundo\Model\Template\AbstractActiveModel;

class ActiveModelTable extends AbstractModelTable
{

    /**
     * @var AbstractActiveModel
     */
    public $model;

    public function getContent()
    {

        $this->reader->filter->andEqual($this->model->active, true);

        /*
        $redirect = new ModelTableRedirect();
        $redirect->label = 'Delete';
        $redirect->parameterName = 'id';
        $redirect->parameterField = $this->model->id;
        $this->addRedirectHyperlink($redirect);*/

        return parent::getContent();
    }


}