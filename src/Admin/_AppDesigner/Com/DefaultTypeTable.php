<?php

namespace Nemundo\Admin\AppDesigner\Com;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelDefaultType\AppModelDefaultTypeReader;
use Nemundo\Admin\AppDesigner\Parameter\DefaultTypeParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Html\Container\HtmlContainer;

class DefaultTypeTable extends HtmlContainer
{

    /**
     * @var string
     */
    public $modelId;

    public function getContent()
    {

        $button = new AdminSiteButton($this);
        $button->content = 'New Default Type';
        $button->site = AppDesignerConfig::$site->app->appModel->modelDefaultTypeNew;
        $button->site->addParameter(new ModelParameter($this->modelId));

        $table = new AdminTable($this);

        $header = new TableHeader($table);
        $header->addText('Field Name');
        $header->addEmpty();

        $defaultTypeReader = new AppModelDefaultTypeReader();
        $defaultTypeReader->connection = new AppDesignerConnection();
        $defaultTypeReader->model->loadAppField();
        $defaultTypeReader->filter->andEqual($defaultTypeReader->model->appModelId, $this->modelId);

        foreach ($defaultTypeReader->getData() as $defaultTypeRow) {


            $row = new TableRow($table);
            $row->addText($defaultTypeRow->appField->appFieldLabel);

            $site = clone(AppDesignerConfig::$site->app->appModel->modelDefaultTypeDelete);
            $site->addParameter(new ModelParameter($this->modelId));
            $site->addParameter(new DefaultTypeParameter($defaultTypeRow->id));
            $row->addIconSite($site);

        }

        return parent::getContent();
    }

}