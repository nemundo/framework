<?php

namespace Nemundo\Admin\AppDesigner\Com;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelReader;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;

class ModelHyperlinkList extends BootstrapHyperlinkList
{

    /**
     * @var string
     */
    public $appId;

    /**
     * @var string
     */
    public $currentModelId;

    public function getContent()
    {

        $modelReader = new AppModelReader();
        $modelReader->connection = new AppDesignerConnection();
        $modelReader->filter->andEqual($modelReader->model->appId, $this->appId);
        $modelReader->filter->andEqual($modelReader->model->active, true);
        $modelReader->filter->andEqual($modelReader->model->editable, true);
        $modelReader->addOrder($modelReader->model->modelLabel);

        foreach ($modelReader->getData() as $modelRow) {

            if ($this->currentModelId == $modelRow->id) {
                $this->addActiveHyperlink($modelRow->modelLabel);
            } else {

                $site = clone(AppDesignerConfig::$site->app->appModel);
                $site->title = $modelRow->modelLabel;
                $site->addParameter(new ModelParameter($modelRow->id));
                $this->addSite($site);

            }

        }

        return parent::getContent();

    }

}