<?php

namespace Nemundo\Admin\AppDesigner\Model\Model\Type;


use Nemundo\Admin\AppDesigner\Model\Model\AppModelFieldOrmModel;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;

use Nemundo\Orm\Type\Number\YesNoOrmType;

class AppFileTypeOrmModel extends AbstractOrmModel
{

    /**
     * @var ExternalOrmType
     */
    public $appField;

    /**
     * @var YesNoOrmType
     */
    public $keepOrginalFilename;

    protected function loadModel()
    {

        $this->tableName = 'app_model_file';
        $this->className = 'AppFileType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppFileType';
        $this->primaryIndex = new UniqueIdPrimaryIndex();

        $this->appField = new ExternalOrmType($this);
        $this->appField->externalModelClassName = AppModelFieldOrmModel::class;
        $this->appField->fieldName = 'app_model_field';
        $this->appField->variableName = 'appField';

        $this->keepOrginalFilename = new YesNoOrmType($this);
        $this->keepOrginalFilename->fieldName = 'keep_orginal_filename';
        $this->keepOrginalFilename->variableName = 'keepOrginalFilename';

    }

}