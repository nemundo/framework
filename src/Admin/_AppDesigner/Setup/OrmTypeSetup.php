<?php

namespace Nemundo\Admin\AppDesigner\Setup;




use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelFieldType\AppModelFieldType;
use Nemundo\Admin\AppDesigner\Data\AppModelFieldType\AppModelFieldTypeCount;
use Nemundo\Admin\AppDesigner\Data\AppModelFieldType\AppModelFieldTypeUpdate;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Model\Type\AbstractModelType;

class OrmTypeSetup extends AbstractBase
{

    public function addOrmType(AbstractModelType $ormType)
    {

        /*
        (new Debug())->write('check addormtype'.$ormType->label);
        (new Debug())->write($ormType);
        exit;*/

        // Wieso ausblenden???

        $count = new AppModelFieldTypeCount();
        $count->connection = new AppDesignerConnection();
        $count->filter->andEqual($count->model->fieldClassName, $ormType->getClassName());

        if ($count->getCount() == 0) {

            $data = new AppModelFieldType();
            $data->connection = new AppDesignerConnection();
            $data->id = $ormType->typeId;
            $data->fieldClassName = $ormType->getClassName();
            $data->fieldType = $ormType->typeLabel;
            $data->save();

        } else {

            $update = new AppModelFieldTypeUpdate();
            $update->connection = new AppDesignerConnection();
            $update->fieldClassName = $ormType->getClassName();
            $update->fieldType = $ormType->typeLabel;
            $update->updateById($ormType->typeId);

        }

    }


    public function removeOrmType(AbstractModelType $ormType)
    {

    }


}