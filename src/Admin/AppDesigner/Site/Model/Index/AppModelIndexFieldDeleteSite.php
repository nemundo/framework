<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\Index;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelIndexField\AppModelIndexFieldDelete;
use Nemundo\Admin\AppDesigner\Data\AppModelIndexField\AppModelIndexFieldReader;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;
use Nemundo\Admin\AppDesigner\Parameter\ModelIndexFieldParameter;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class AppModelIndexFieldDeleteSite extends AbstractIconSite
{

    protected function loadSite()
    {
        $this->url = 'delete-field';
        $this->menuActive = false;
        $this->icon = new DeleteIcon();
    }


    public function loadContent()
    {

        $fieldId = (new ModelIndexFieldParameter())->getValue();

        $conn = new AppDesignerConnection();

        $fieldReader = new AppModelIndexFieldReader();
        $fieldReader->connection = $conn;
        $fieldRow = $fieldReader->getRowById($fieldId);
        $modelId = $fieldRow->appField->appModelId;

        $delete = new AppModelIndexFieldDelete();
        $delete->connection = $conn;
        $delete->deleteById($fieldId);

        $orm = new AppDesignerModelOrmSetup();
        $orm->connection = $conn;
        $orm->createOrm($modelId);

        (new UrlReferer())->redirect();

    }

}