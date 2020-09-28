<?php

namespace Nemundo\Admin\AppDesigner\Model\Model;


use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Model\Definition\Model\ModelTrait\SortableTrait;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;

class AppModelDefaultOrderTypeOrmModel extends AbstractOrmModel
{

    use SortableTrait;

    /**
     * @var ExternalOrmType
     */
    public $appModel;

    /**
     * @var ExternalOrmType
     */
    public $appField;


    protected function loadModel()
    {

        $this->label = 'Default Order Type';
        $this->tableName = 'app_model_default_order_type';
        $this->className = 'AppModelDefaultOrderType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType';
        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->appModel = new ExternalOrmType($this);
        $this->appModel->externalModelClassName = AppModelOrmModel::class;
        $this->appModel->fieldName = 'app_model';
        $this->appModel->variableName = 'appModel';
        $this->appModel->visible->table = false;
        $this->appModel->visible->form = false;

        $this->appField = new ExternalOrmType($this);
        $this->appField->externalModelClassName = AppModelFieldOrmModel::class;
        $this->appField->fieldName = 'app_model_field';
        $this->appField->variableName = 'appField';
        $this->appField->validation = true;

        $this->loadSortable();

        // wieder aktivieren
        //$this->addInsertAction(new DefaultOrderTypeAction());


        //$this->addAfterDeleteAction(new DefaultOrderTypeAction());

    }

}