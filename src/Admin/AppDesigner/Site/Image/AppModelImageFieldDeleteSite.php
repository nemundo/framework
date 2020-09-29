<?php

namespace Nemundo\Admin\AppDesigner\Site\Image;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppImageType\AppImageTypeDelete;
use Nemundo\Admin\AppDesigner\Data\AppImageType\AppImageTypeReader;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;
use Nemundo\Admin\AppDesigner\Parameter\ImageTypeParameter;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Http\Url\UrlReferer;

class AppModelImageFieldDeleteSite extends AbstractIconSite
{

    protected function loadSite()
    {
        $this->url = 'image-delete';
        $this->menuActive = false;
        $this->icon = new DeleteIcon();
    }


    public function loadContent()
    {

        $imageTypeId = (new ImageTypeParameter())->getValue();

        $conn = new AppDesignerConnection();

        $imageTypeReader = new AppImageTypeReader();
        $imageTypeReader->connection = $conn;
        $imageTypeReader->model->loadAppField();
        $imageTypeRow = $imageTypeReader->getRowById($imageTypeId);
        $modelId = $imageTypeRow->appField->appModelId;

        $delete = new AppImageTypeDelete();
        $delete->connection = $conn;
        $delete->deleteById($imageTypeId);

        $orm = new AppDesignerModelOrmSetup();
        $orm->connection = $conn;
        $orm->createOrm($modelId);

        (new UrlReferer())->redirect();

    }


}