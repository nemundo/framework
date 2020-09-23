<?php

namespace Nemundo\Admin\AppDesigner\Item;

use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType\AppPrefixAutoNumberTypeReader;

class PrefixAutoNumberModelFieldAdminItem extends AbstractModelFieldAdminItem
{

    public function getContent()
    {

        $typeReader = new AppPrefixAutoNumberTypeReader();
        $typeReader->connection = new AppDesignerConnection();
        $typeReader->filter->andEqual($typeReader->model->appFieldId, $this->fieldId);
        $typeRow = $typeReader->getRow();
        $this->addContent('Prefix: ' . $typeRow->prefix . 'Start Number: ' . $typeRow->startNumber);

        return parent::getContent();
    }

}