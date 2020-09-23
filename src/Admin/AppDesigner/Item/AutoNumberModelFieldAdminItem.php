<?php

namespace Nemundo\Admin\AppDesigner\Item;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppAutoNumberType\AppAutoNumberTypeReader;

class AutoNumberModelFieldAdminItem extends AbstractModelFieldAdminItem
{

    public function getContent()
    {

        $typeReader = new AppAutoNumberTypeReader();
        $typeReader->connection = new AppDesignerConnection();
        $typeReader->filter->andEqual($typeReader->model->appFieldId, $this->fieldId);
        $typeRow = $typeReader->getRow();
        $this->addContent('Start Number: ' . $typeRow->startNumber);

        return parent::getContent();
    }

}