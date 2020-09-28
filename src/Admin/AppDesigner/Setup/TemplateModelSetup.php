<?php

namespace Nemundo\Admin\AppDesigner\Setup;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppTemplateModel\AppTemplateModel;
use Nemundo\Admin\AppDesigner\Data\AppTemplateModel\AppTemplateModelCount;
use Nemundo\Admin\AppDesigner\Data\AppTemplateModel\AppTemplateModelUpdate;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Orm\Model\AbstractOrmModel;

class TemplateModelSetup extends AbstractBase
{

    public function addTemplateModel(AbstractOrmModel $ormModel)
    {

        $count = new AppTemplateModelCount();
        $count->connection = new AppDesignerConnection();
        $count->filter->andEqual($count->model->id, $ormModel->templateId);

        if ($count->getCount() == 0) {

            $data = new AppTemplateModel();
            $data->connection = new AppDesignerConnection();
            $data->id = $ormModel->templateId;
            $data->template = $ormModel->templateLabel;
            $data->templateClass = $ormModel->getClassName();
            $data->save();

        } else {

            $update = new AppTemplateModelUpdate();
            $update->connection = new AppDesignerConnection();
            $update->template = $ormModel->templateLabel;
            $update->templateClass = $ormModel->getClassName();
            $update->updateById($ormModel->templateId);

        }

    }

}