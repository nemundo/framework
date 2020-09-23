<?php

namespace Nemundo\Admin\AppDesigner\Model\Model\Index;

use Nemundo\Admin\AppDesigner\Model\Model\AppModelFieldOrmModel;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\Number\NumberOrmType;

class AppModelIndexFieldOrmModel extends AbstractOrmModel
{

    /**
     * @var ExternalOrmType
     */
    public $appIndex;

    /**
     * @var ExternalOrmType
     */
    public $appField;

    /**
     * @var NumberOrmType
     */
    public $itemOrder;


    protected function loadModel()
    {

        $this->label = 'Index';
        $this->tableName = 'app_model_index_field';
        $this->className = 'AppModelIndexField';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppModelIndexField';

        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->appIndex = new ExternalOrmType($this);
        $this->appIndex->externalModelClassName = AppModelIndexOrmModel::class;
        $this->appIndex->fieldName = 'app_model_index';
        $this->appIndex->variableName = 'appIndex';
        $this->appIndex->visible->table = false;
        $this->appIndex->visible->form = false;

        $this->appField = new ExternalOrmType($this);
        $this->appField->externalModelClassName = AppModelFieldOrmModel::class;
        $this->appField->fieldName = 'app_model_field';
        $this->appField->variableName = 'appField';
        $this->appField->label = 'Field';
        $this->appField->loadModel = true;

        $this->itemOrder = new NumberOrmType($this);
        $this->itemOrder->fieldName = 'item_order';
        $this->itemOrder->variableName = 'itemOrder';
        $this->itemOrder->visible->form = false;
        //$this->itemOrder->visible->f = false;

        // wieder aktivieren
        //$this->addInsertAction(new AppModelIndexFieldAction());
        //$this->addAfterDeleteAction(new AppModelIndexFieldAction());

    }

}