<?php

namespace Nemundo\Admin\AppDesigner\Site\Model\DefaultOrderType;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType\AppModelDefaultOrderTypeDelete;
use Nemundo\Admin\AppDesigner\Factory\RowFactory;
use Nemundo\Admin\AppDesigner\Orm\AppDesignerModelOrmSetup;
use Nemundo\Admin\AppDesigner\Parameter\DefaultOrderTypeParameter;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Url\UrlReferer;

class DefaultOrderTypeDeleteSite extends AbstractIconSite
{

    protected function loadSite()
    {
        $this->url = 'default-order-type-delete';
        $this->menuActive = false;
        $this->icon = new DeleteIcon();
    }


    public function loadContent()
    {

        $conn = new AppDesignerConnection();

        $factory = new RowFactory();
        $factory->connection = $conn;
        $modelRow = $factory->getModelRow();

        $delete = new AppModelDefaultOrderTypeDelete();
        $delete->connection = $conn;
        $delete->deleteById((new DefaultOrderTypeParameter())->getValue());

        $orm = new AppDesignerModelOrmSetup();
        $orm->connection = $conn;
        $orm->createOrm($modelRow->id);

        (new UrlReferer())->redirect();

    }

}