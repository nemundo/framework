<?php

namespace Nemundo\Admin\AppDesigner\Site\Image;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppImageType\AppImageTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldReader;
use Nemundo\Admin\AppDesigner\Parameter\ImageTypeParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelFieldParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;

use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class AppModelImageFieldSite extends AbstractSite
{

    /**
     * @var AppModelImageFieldSite
     */
    public static $site;

    /**
     * @var AppModelImageFieldDeleteSite
     */
    private $delete;

    /**
     * @var AppModelImageFieldNewSite
     */
    private $new;

    protected function loadSite()
    {

        $this->title = 'Image Edit';
        $this->url = 'image-field';
        $this->menuActive = false;

        $this->new = new AppModelImageFieldNewSite($this);
        $this->delete = new AppModelImageFieldDeleteSite($this);

    }

    protected function registerSite()
    {
        AppModelImageFieldSite::$site = $this;
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $fieldId = (new ModelFieldParameter())->getValue();

        $fieldReader = new AppModelFieldReader();
        $fieldReader->connection = new AppDesignerConnection();
        $fieldReader->model->loadAppModel();
        $fieldRow = $fieldReader->getRowById($fieldId);

        $layout = new BootstrapTwoColumnLayout($page);

        $link = new SiteHyperlink($layout->col1);
        $link->site = clone(AppDesignerConfig::$site->app->appModel);
        $link->site->title = 'Back';
        $link->site->addParameter(new ModelParameter($fieldRow->appModelId));

        $table = new AdminLabelValueTable($layout->col1);
        $table->addLabelValue('Model', $fieldRow->appModel->modelLabel);
        $table->addLabelValue('Field', $fieldRow->appFieldName);

        $btn = new AdminSiteButton($layout->col1);
        $btn->content = 'New';
        $btn->site = clone($this->new);
        $btn->site->addParameter(new ModelFieldParameter($fieldId));

        $table = new AdminTable($layout->col1);

        $imageTypeReader = new AppImageTypeReader();
        $imageTypeReader->connection = new AppDesignerConnection();
        $imageTypeReader->model->loadResizeType();
        $imageTypeReader->filter->andEqual($imageTypeReader->model->appFieldId, $fieldId);
        foreach ($imageTypeReader->getData() as $imageTypeRow) {

            $fieldRow = new TableRow($table);
            $fieldRow->addText($imageTypeRow->resizeType->resizeType);
            $fieldRow->addText($imageTypeRow->size);

            $site = clone($this->delete);
            $site->addParameter(new ImageTypeParameter($imageTypeRow->id));
            $fieldRow->addIconSite($site);

        }

        $page->render();

    }

}