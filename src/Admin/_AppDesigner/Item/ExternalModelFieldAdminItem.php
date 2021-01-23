<?php

namespace Nemundo\Admin\AppDesigner\Item;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppExternalType\AppExternalTypeReader;
use Nemundo\Html\Block\Br;

class ExternalModelFieldAdminItem extends AbstractModelFieldAdminItem
{

    public function getContent()
    {

        $externalTypeReader = new AppExternalTypeReader();
        $externalTypeReader->connection = new AppDesignerConnection();
        $externalTypeReader->model->loadExternalModel();
        $externalTypeReader->filter->andEqual($externalTypeReader->model->appFieldId, $this->fieldId);
        $externalTypeRow = $externalTypeReader->getRow();
        $this->addContent('External Model: ' . $externalTypeRow->externalModel->modelLabel);
        if ($externalTypeRow->appLoadModel) {
            $this->addContent((new Br())->getContent() . 'Load Model');
        }

        return parent::getContent();

    }

}