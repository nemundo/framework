<?php

namespace Nemundo\Admin\AppDesigner\Install;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelUpdate;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Orm\Model\Template\DefaultOrmModel;

class AppDesignerUpdate extends AbstractScript
{

    public function run()
    {

        $update = new AppModelUpdate();
        $update->connection = new AppDesignerConnection();
        $update->editable = true;
        $update->update();

        $update = new AppModelUpdate();
        $update->connection = new AppDesignerConnection();
        $update->templateModelId = (new DefaultOrmModel())->templateId;
        $update->update();


    }

}