<?php

namespace Nemundo\Admin\AppDesigner\Model\Model\Type;

use Nemundo\Admin\AppDesigner\Model\Model\AppModelFieldOrmModel;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\Number\NumberOrmType;
use Nemundo\Orm\Type\Text\TextOrmType;

class AppPrefixAutoNumberTypeOrmModel extends AbstractOrmModel
{

    /**
     * @var ExternalOrmType
     */
    public $appField;

    /**
     * @var TextOrmType
     */
    public $prefix;

    /**
     * @var NumberOrmType
     */
    public $startNumber;

    protected function loadModel()
    {

        $this->tableName = 'app_model_prefix_auto_number';
        $this->className = 'AppPrefixAutoNumberType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType';
        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->appField = new ExternalOrmType($this);
        $this->appField->externalModelClassName = AppModelFieldOrmModel::class;
        $this->appField->fieldName = 'app_model_field';
        $this->appField->variableName = 'appField';

        $this->prefix = new TextOrmType($this);
        $this->prefix->fieldName = 'prefix';
        $this->prefix->variableName = 'prefix';

        $this->startNumber = new NumberOrmType($this);
        $this->startNumber->fieldName = 'start_number';
        $this->startNumber->variableName = 'startNumber';

    }

}