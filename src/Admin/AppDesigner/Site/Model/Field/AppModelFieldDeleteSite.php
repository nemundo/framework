<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\Field;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldReader;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldUpdate;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;
use Nemundo\Admin\AppDesigner\Parameter\ModelFieldParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Http\Url\UrlReferer;

class AppModelFieldDeleteSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->url = 'field-delete';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $conn = new AppDesignerConnection();

        $modelFieldParameter = new ModelFieldParameter();
        $modelFieldId = $modelFieldParameter->getValue();

        $modelFieldReader = new AppModelFieldReader();
        $modelFieldReader->connection = $conn;
        $modelFieldRow = $modelFieldReader->getRowById($modelFieldId);
        $modelId = $modelFieldRow->appModelId;

        $update = new AppModelFieldUpdate();
        $update->connection = $conn;
        $update->active = false;
        $update->updateById($modelFieldId);

        $orm = new AppDesignerModelOrmSetup();
        $orm->connection = $conn;
        $orm->createOrm($modelId);

        (new UrlReferer())->redirect();

    }

}