<?php

namespace Nemundo\Admin\AppDesigner\Model\Model\Type;


use Nemundo\Admin\AppDesigner\Model\Model\AppModelFieldOrmModel;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Model\Type\Id\UniqueIdType;
use Nemundo\Model\Type\Number\NumberType;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\Number\NumberOrmType;

class AppImageTypeOrmModel extends AbstractOrmModel
{

    /**
     * @var ExternalOrmType
     */
    public $appField;

    /**
     * @var NumberType
     */
    public $size;

    /**
     * @var UniqueIdType
     */
    public $resizeType;


    protected function loadModel()
    {

        $this->tableName = 'app_model_image';
        $this->className = 'AppImageType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppImageType';
        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->appField = new ExternalOrmType($this);
        $this->appField->externalModelClassName = AppModelFieldOrmModel::class;
        $this->appField->fieldName = 'app_model_field';
        $this->appField->variableName = 'appField';

        $this->size = new NumberOrmType($this);
        $this->size->fieldName = 'size';
        $this->size->variableName = 'size';

        $this->resizeType = new ExternalOrmType($this);
        $this->resizeType->externalModelClassName = AppImageResizeTypeOrmModel::class;
        $this->resizeType->fieldName = 'resize_type';
        $this->resizeType->variableName = 'resizeType';

    }

}