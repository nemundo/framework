<?php

namespace Nemundo\Model\Admin;


use Nemundo\Model\Table\ModelPaginationTable;

class ModelAdmin extends AbstractModelAdmin
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->table = new ModelPaginationTable();

    }

}