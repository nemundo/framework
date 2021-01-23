<?php

namespace Nemundo\Admin\AppDesigner\Model\Model\Type;


use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\Text\TextOrmType;

class AppImageResizeTypeOrmModel extends AbstractOrmModel
{

    /**
     * @var TextOrmType
     */
    public $resizeType;

    protected function loadModel()
    {

        $this->tableName = 'app_model_image_resize_type';
        $this->className = 'AppImageResizeType';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppImageResizeType';
        $this->primaryIndex = new TextIdPrimaryIndex();

        $this->resizeType = new TextOrmType($this);
        $this->resizeType->fieldName = 'resize_type';
        $this->resizeType->variableName = 'resizeType';

        $this->addDefaultType($this->resizeType);

    }

}