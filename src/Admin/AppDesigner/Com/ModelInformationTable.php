<?php

namespace Nemundo\Admin\AppDesigner\Com;

use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelRow;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Core\Debug\Debug;

class ModelInformationTable extends AdminLabelValueTable
{

    /**
     * @var AppModelRow
     */
    public $modelRow;

    public function getContent()
    {

        //(new Debug())->write($this->modelRow);

        $this->addLabelValue('Template', $this->modelRow->templateModel->template);
        $this->addLabelValue('Table Name', $this->modelRow->modelTableName);
        $this->addLabelValue('Class Name', $this->modelRow->modelClassName);
        $this->addLabelValue('Namespace', $this->modelRow->modelNamespace);
        $this->addLabelValue('Primary Index', $this->modelRow->modelPrimaryIndex->indexType);
        $this->addLabelValue('Row Class Name', $this->modelRow->rowClassName);
        $this->addLabelYesNoValue('Create Admin Orm', $this->modelRow->modelCreateAdminOrm);

        return parent::getContent();

    }

}