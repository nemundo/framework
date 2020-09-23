<?php

namespace Nemundo\Admin\AppDesigner\Form\Model;


use Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType\AppModelDefaultOrderTypeForm;
use Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType\AppModelDefaultOrderTypeReader;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;

class DefaultOrderTypeForm extends AppModelDefaultOrderTypeForm
{

    protected function onSubmit()
    {

        $id = parent::onSubmit();

        $reader = new  AppModelDefaultOrderTypeReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($id);

        $orm = new AppDesignerModelOrmSetup();
        $orm->connection = $this->connection;
        $orm->createOrm($row->appModelId);

    }

}