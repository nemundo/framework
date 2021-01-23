<?php

namespace Nemundo\Admin\AppDesigner\Item;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppTextType\AppTextTypeReader;

class TextModelFieldAdminItem extends AbstractModelFieldAdminItem
{

    public function getContent()
    {

        $textTypeReader = new AppTextTypeReader();
        $textTypeReader->connection = new AppDesignerConnection();
        $textTypeReader->filter->andEqual($textTypeReader->model->appFieldId, $this->fieldId);
        $textTypeRow = $textTypeReader->getRow();
        $this->addContent('Length: ' . $textTypeRow->length);

        return parent::getContent();

    }

}