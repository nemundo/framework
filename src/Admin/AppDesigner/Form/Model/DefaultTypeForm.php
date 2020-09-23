<?php

namespace Nemundo\Admin\AppDesigner\Form\Model;


use Nemundo\Admin\AppDesigner\Data\AppModelDefaultType\AppModelDefaultTypeForm;
use Nemundo\Admin\AppDesigner\Data\AppModelDefaultType\AppModelDefaultTypeReader;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;

class DefaultTypeForm extends AppModelDefaultTypeForm
{

    protected function onSubmit()
    {

        $id = parent::onSubmit();

        $reader = new  AppModelDefaultTypeReader();
        $reader->connection = $this->connection;
        $row = $reader->getRowById($id);

        $orm = new AppDesignerModelOrmSetup();
        $orm->connection = $this->connection;
        $orm->createOrm($row->appModelId);

    }

}