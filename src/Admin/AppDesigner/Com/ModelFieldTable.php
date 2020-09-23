<?php

namespace Nemundo\Admin\AppDesigner\Com;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldReader;
use Nemundo\Admin\AppDesigner\Item\AbstractModelFieldAdminItem;
use Nemundo\Admin\AppDesigner\Parameter\ModelFieldParameter;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Orm\Type\OrmTypeTrait;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Icon\EditIcon;
use Nemundo\Package\JqueryUi\Sortable\JquerySortable;

class ModelFieldTable extends AdminTable
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

        $this->id = 'model_field_sortable';

        $header = new TableHeader($this);
        $header->addText('Field Label');
        $header->addText('Field Name');
        $header->addText('Variable Name');
        $header->addText('Type');
        $header->addEmpty();
        $header->addText('Allow Null');
        $header->addText('Validation');
        $header->addText('Visible Form');
        $header->addText('Visible Table');
        $header->addText('Visible View');

        $header->addEmpty();
        $header->addEmpty();
        //$header->addEmpty();
        //$header->addEmpty();

        $fieldReader = new AppModelFieldReader();
        $fieldReader->connection = $this->connection;
        $fieldReader->model->loadAppFieldType();
        $fieldReader->filter->andEqual($fieldReader->model->active, true);
        $fieldReader->filter->andEqual($fieldReader->model->appModelId, $this->modelId);

        foreach ($fieldReader->getData() as $fieldRow) {

            $row = new TableRow($this);
            $row->id = 'item_' . $fieldRow->id;
            $row->addText($fieldRow->appFieldLabel);
            $row->addText($fieldRow->appFieldName);
            $row->addText($fieldRow->appFieldVariableName);
            $row->addText($fieldRow->appFieldType->fieldType);


            //(new Debug())->write($fieldRow->appFieldName.'class name: '.$fieldRow->appFieldType->fieldClassName);

            /** @var OrmTypeTrait $type */
            $type = new $fieldRow->appFieldType->fieldClassName();

            if ($type->adminItemClassName !== null) {

                /** @var AbstractModelFieldAdminItem $item */
                $item = new $type->adminItemClassName($row);
                $item->fieldId = $fieldRow->id;


            } else {
                $row->addEmpty();
            }

            $row->addYesNo($fieldRow->appAllowNullValue);
            $row->addYesNo($fieldRow->appFieldValidation);
            $row->addYesNo($fieldRow->formVisible);
            $row->addYesNo($fieldRow->tableVisible);
            $row->addYesNo($fieldRow->viewVisible);

            $site = clone(AppDesignerConfig::$site->app->appModel->fieldEdit);
            $site->addParameter(new ModelFieldParameter($fieldRow->id));
            $row->addHyperlinkIcon(new EditIcon(), $site);

            $site = clone(AppDesignerConfig::$site->app->appModel->fieldDelete);
            $site->addParameter(new ModelFieldParameter($fieldRow->id));
            $row->addHyperlinkIcon(new DeleteIcon(), $site);

        }

        $sortable = new JquerySortable($this);
        $sortable->id = $this->id . ' tbody';
        $sortable->sortableSite = clone(AppDesignerConfig::$site->app->appModel->fieldSortable);

        return parent::getContent();

    }

}