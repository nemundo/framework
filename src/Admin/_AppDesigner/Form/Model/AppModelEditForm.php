<?php

namespace Nemundo\Admin\AppDesigner\Form\Model;


use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelFormUpdate;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;

class AppModelEditForm extends AppModelFormUpdate
{

    protected function onSubmit()
    {

        parent::onSubmit();

        $orm = new AppDesignerModelOrmSetup();
        $orm->connection = $this->connection;
        $orm->createOrm($this->updateId);

    }

}