<?php

namespace Nemundo\Admin\AppDesigner\Item;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppExternalUserType\AppExternalUserTypeReader;

class ExternalUserModelFieldAdminItem extends AbstractModelFieldAdminItem
{

    public function getContent()
    {

        $externalUserTypeReader = new AppExternalUserTypeReader();
        $externalUserTypeReader->connection = new AppDesignerConnection();
        $externalUserTypeReader->filter->andEqual($externalUserTypeReader->model->appFieldId, $this->fieldId);
        $externalTypeRow = $externalUserTypeReader->getRow();
        if ($externalTypeRow->appLoadModel) {
            $this->addContent('Load Model');
        }

        return parent::getContent();
    }

}