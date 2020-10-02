<?php

namespace Nemundo\Admin\AppDesigner\Site\App;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\App\AppUpdate;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelReader;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelUpdate;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;

use Nemundo\Core\Http\Url\UrlReferer;

class AppDeleteSite extends AbstractIconSite
{

    protected function loadSite()
    {
        $this->title = 'Delete';
        $this->url = 'app-delete';
        $this->icon = new DeleteIcon();
        //$this->menuActive = false;
    }


    public function loadContent()
    {

        $appId = (new AppParameter())->getValue();

        $modelReader = new AppModelReader();
        $modelReader->connection = new AppDesignerConnection();
        $modelReader->filter->andEqual($modelReader->model->appId, $appId);
        foreach ($modelReader->getData() as $modelRow) {

            $update = new AppModelUpdate();
            $update->connection = new AppDesignerConnection();
            $update->active = false;
            $update->updateById($modelRow->id);
        }

        $update = new AppUpdate();
        $update->connection = new AppDesignerConnection();
        $update->active = false;
        $update->updateById($appId);

        (new UrlReferer())->redirect();

    }

}