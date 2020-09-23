<?php

namespace Nemundo\Admin\AppDesigner\Item;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppFileType\AppFileTypeCount;
use Nemundo\Admin\AppDesigner\Data\AppFileType\AppFileTypeReader;

class FileModelFieldAdminItem extends AbstractModelFieldAdminItem
{

    public function getContent()
    {

        $keepOrginalFilename = false;

        $count = new AppFileTypeCount();
        $count->connection = new AppDesignerConnection();
        $count->filter->andEqual($count->model->appFieldId, $this->fieldId);
        if ($count->getCount() > 0) {
            $textTypeReader = new AppFileTypeReader();
            $textTypeReader->connection = new AppDesignerConnection();
            $textTypeReader->filter->andEqual($textTypeReader->model->appFieldId, $this->fieldId);
            $textTypeRow = $textTypeReader->getRow();
            $keepOrginalFilename = $textTypeRow->keepOrginalFilename;
        }

        $this->addContent('Keep Orginal File: ' . $keepOrginalFilename);

        return parent::getContent();

    }

}