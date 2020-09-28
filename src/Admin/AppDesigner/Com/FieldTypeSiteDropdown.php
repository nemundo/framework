<?php

namespace Nemundo\Admin\AppDesigner\Com;

use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelFieldType\AppModelFieldTypeReader;
use Nemundo\Admin\AppDesigner\Parameter\ModelFieldTypeParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;

class FieldTypeSiteDropdown extends BootstrapSiteDropdown
{

    /**
     * @var string
     */
    public $modelId;

    public function getContent()
    {

        $reader = new AppModelFieldTypeReader();
        $reader->connection = new AppDesignerConnection();
        $reader->addOrder($reader->model->fieldType);

        foreach ($reader->getData() as $fieldTypeRow) {
            $site = clone(AppDesignerConfig::$site->app->appModel->fieldNew);
            $site->title = $fieldTypeRow->fieldType;
            $site->addParameter(new ModelParameter($this->modelId));
            $site->addParameter(new ModelFieldTypeParameter($fieldTypeRow->id));
            $this->addSite($site);
        }

        return parent::getContent();

    }

}