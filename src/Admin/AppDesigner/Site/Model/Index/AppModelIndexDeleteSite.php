<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\Index;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexDelete;
use Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexReader;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;
use Nemundo\Admin\AppDesigner\Parameter\ModelIndexParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;

class AppModelIndexDeleteSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->url = 'index-delete';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $indexId = (new ModelIndexParameter())->getValue();

        $conn = new AppDesignerConnection();

        $indexReader = new AppModelIndexReader();
        $indexReader->connection = $conn;
        $indexRow = $indexReader->getRowById($indexId);
        $modelId = $indexRow->appModelId;

        $delete = new AppModelIndexDelete();
        $delete->connection = $conn;
        $delete->deleteById($indexId);

        $orm = new AppDesignerModelOrmSetup();
        $orm->connection = $conn;
        $orm->createOrm($modelId);

        (new UrlReferer())->redirect();

    }

}