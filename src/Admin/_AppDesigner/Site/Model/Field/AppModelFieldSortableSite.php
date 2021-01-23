<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\Field;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldReader;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldUpdate;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;
use Nemundo\Web\Site\AbstractSite;

class AppModelFieldSortableSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->url = 'sortable';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $itemOrder = 0;


        $fieldValue = null;
        foreach ($_POST['item'] as $value) {

            $fieldValue = $value;

            $data = new AppModelFieldUpdate();
            $data->connection = new AppDesignerConnection();
            $data->itemOrder = $itemOrder;
            $data->updateById($value);

            $itemOrder++;

        }


        $fieldReader = new AppModelFieldReader();
        $fieldReader->connection = new AppDesignerConnection();
        $fieldRow = $fieldReader->getRowById($fieldValue);

        $orm = new AppDesignerModelOrmSetup();
        $orm->createOrm($fieldRow->appModelId);

    }

}