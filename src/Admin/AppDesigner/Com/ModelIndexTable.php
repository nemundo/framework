<?php

namespace Nemundo\Admin\AppDesigner\Com;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexReader;
use Nemundo\Admin\AppDesigner\Data\AppModelIndexField\AppModelIndexFieldReader;
use Nemundo\Admin\AppDesigner\Parameter\ModelIndexParameter;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;

class ModelIndexTable extends AdminClickableTable
{

    use ConnectionTrait;

    /**
     * @var string
     */
    public $modelId;

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->loadConnection();
    }

    public function getContent()
    {

        $header = new TableHeader($this);
        $header->addText('Index');
        $header->addText('Field');
        $header->addEmpty();


        $indexReader = new AppModelIndexReader();
        $indexReader->connection = $this->connection;
        $indexReader->model->loadIndexType();
        $indexReader->filter->andEqual($indexReader->model->appModelId, $this->modelId);


        foreach ($indexReader->getData() as $indexRow) {

            $row = new BootstrapClickableTableRow($this);
            $row->addText($indexRow->indexType->indexType);


            $field = new TextDirectory();

            $indexFieldReader = new AppModelIndexFieldReader();
            $indexFieldReader->connection = $this->connection;
            $indexFieldReader->model->loadAppIndex();
            $indexFieldReader->model->loadAppField();
            $indexFieldReader->filter->andEqual($indexFieldReader->model->appIndex, $indexRow->id);
            foreach ($indexFieldReader->getData() as $indexFieldRow) {
                $field->addValue($indexFieldRow->appField->appFieldLabel);
            }

            $row->addText($field->getTextWithSeperator(','));

            $site = clone(AppDesignerConfig::$site->app->appModel->modelIndexDelete);
            $site->addParameter(new ModelIndexParameter($indexRow->id));
            $row->addHyperlinkIcon(new DeleteIcon(), $site);

            $site = clone(AppDesignerConfig::$site->app->appModel->modelIndex);
            $site->addParameter(new ModelIndexParameter($indexRow->id));
            $row->addClickableSite($site);

        }

        return parent::getContent();

    }

}