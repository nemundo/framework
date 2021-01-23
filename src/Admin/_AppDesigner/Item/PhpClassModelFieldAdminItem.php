<?php

namespace Nemundo\Admin\AppDesigner\Item;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppPhpClassType\AppPhpClassTypeReader;

class PhpClassModelFieldAdminItem extends AbstractModelFieldAdminItem
{

    public function getContent()
    {

        $typeReader = new AppPhpClassTypeReader();
        $typeReader->connection = new AppDesignerConnection();
        $typeReader->filter->andEqual($typeReader->model->appFieldId, $this->fieldId);
        $typeRow = $typeReader->getRow();
        $this->addContent('Php Class: ' . $typeRow->phpClassName);

        return parent::getContent();
    }

}