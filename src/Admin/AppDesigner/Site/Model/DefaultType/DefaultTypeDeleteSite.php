<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\DefaultType;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelDefaultType\AppModelDefaultTypeDelete;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;
use Nemundo\Admin\AppDesigner\Parameter\DefaultTypeParameter;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class DefaultTypeDeleteSite extends AbstractIconSite
{

    protected function loadSite()
    {
        $this->url = 'default-type-delete';
        $this->menuActive = false;
        $this->icon = new DeleteIcon();
    }


    public function loadContent()
    {

        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $modelRow = $factory->getModelRow();

        $delete = new AppModelDefaultTypeDelete();
        $delete->connection = $conn;
        $delete->deleteById((new DefaultTypeParameter())->getValue());

        $orm = new AppDesignerModelOrmSetup();
        $orm->connection = $conn;
        $orm->createOrm($modelRow->id);

        (new UrlReferer())->redirect();

    }

}