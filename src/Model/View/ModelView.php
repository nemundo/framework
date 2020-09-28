<?php

namespace Nemundo\Model\View;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Package\Bootstrap\Table\BootstrapLabelValueTable;


class ModelView extends AdminLabelValueTable
{

    use ModelViewTrait;

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->loadModelView();
    }

    public function getContent()
    {

        foreach ($this->getComList() as $com) {
            $this->addLabelValue($com->type->label, $com->getContent());
        }

        return parent::getContent();
    }

}