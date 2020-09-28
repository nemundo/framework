<?php

namespace Nemundo\Admin\AppDesigner\Com;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType\AppModelDefaultOrderTypeReader;
use Nemundo\Admin\AppDesigner\Parameter\DefaultOrderTypeParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Html\Container\HtmlContainer;

class DefaultOrderTypeTable extends HtmlContainer
{

    /**
     * @var string
     */
    public $modelId;

    public function getContent()
    {

        $button = new AdminSiteButton($this);
        $button->content = 'New Default Order Type';
        $button->site = AppDesignerConfig::$site->app->appModel->modelDefaultOrderTypeNew;
        $button->site->addParameter(new ModelParameter($this->modelId));

        $table = new AdminTable($this);

        $header = new TableHeader($table);
        $header->addText('Field Name');
        $header->addEmpty();

        $defaultTypeReader = new AppModelDefaultOrderTypeReader();
        $defaultTypeReader->connection = new AppDesignerConnection();
        $defaultTypeReader->model->loadAppField();
        $defaultTypeReader->filter->andEqual($defaultTypeReader->model->appModelId, $this->modelId);

        foreach ($defaultTypeReader->getData() as $defaultTypeRow) {

            $row = new TableRow($table);
            $row->addText($defaultTypeRow->appField->appFieldLabel);

            $site = clone(AppDesignerConfig::$site->app->appModel->modelDefaultOrderTypeDelete);
            $site->addParameter(new ModelParameter($this->modelId));
            $site->addParameter(new DefaultOrderTypeParameter($defaultTypeRow->id));
            $row->addIconSite($site);

        }

        return parent::getContent();

    }

}