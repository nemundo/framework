<?php

namespace Nemundo\Admin\AppDesigner\Model\Model\Index;

use Nemundo\Admin\AppDesigner\Model\Model\AppModelOrmModel;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;

class AppModelIndexOrmModel extends AbstractOrmModel
{

    /**
     * @var ExternalOrmType
     */
    public $appModel;

    /**
     * @var ExternalOrmType
     */
    public $indexType;


    protected function loadModel()
    {

        $this->label = 'Index';
        $this->tableName = 'app_model_index';
        $this->className = 'AppModelIndex';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppModelIndex';
        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->appModel = new  ExternalOrmType($this);
        $this->appModel->externalModelClassName = AppModelOrmModel::class;
        $this->appModel->fieldName = 'app_model';
        $this->appModel->variableName = 'appModel';
        $this->appModel->visible->table = false;
        $this->appModel->visible->form = false;

         $this->indexType = new ExternalOrmType($this);
        $this->indexType->externalModelClassName = AppModelIndexTypeOrmModel::class;
        $this->indexType->fieldName = 'app_model_index_type';
        $this->indexType->variableName = 'indexType';


        //$this->addInsertAction(new AppModelIndexAction());

        // wieder aktivieren
        //$this->addBeforeDeleteAction(new AppModelIndexAction());

    }

}