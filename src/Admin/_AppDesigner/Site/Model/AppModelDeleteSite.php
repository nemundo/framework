<?php

namespace Nemundo\Admin\AppDesigner\Site\Model;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelUpdate;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldUpdate;
use Nemundo\Admin\AppDesigner\Delete\ModelFileDelete;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Orm\CollectionOrm;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Web\Site\AbstractSite;

class AppModelDeleteSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Delete Model';
        $this->url = 'model-delete';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $modelRow = $factory->getModelRow();

        $appId = $modelRow->appId;
        $modelId = $modelRow->id;

        (new ModelFileDelete())->delete($modelRow);

        $update = new AppModelFieldUpdate();
        $update->connection =$conn;
        $update->filter->andEqual($update->model->appModelId, $modelId);
        $update->active = false;
        $update->update();

        $update = new AppModelUpdate();
        $update->connection = $conn;
        $update->active = false;
        $update->updateById($modelId);

        $orm = new CollectionOrm();
        $orm->connection = $conn;
        $orm->appId = $appId;
        $orm->project = AppDesignerConfig::$defaultProject;
        $orm->createCollection();

        $site = clone(AppDesignerConfig::$site->app->appModel);
        $site->addParameter(new AppParameter($appId));
        $site->redirect();

    }

}