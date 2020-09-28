<?php

namespace Nemundo\Admin\AppDesigner\Collection;


use Nemundo\Admin\AppDesigner\Model\App\AppOrmModel;

use Nemundo\Admin\AppDesigner\Model\Model\AppModelDefaultOrderTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\AppModelDefaultTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\AppModelFieldOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\AppModelFieldTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\AppModelOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\AppModelPrimaryIndexTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\AppTemplateModelOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\Index\AppModelIndexFieldOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\Index\AppModelIndexOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\Index\AppModelIndexTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\Type\AppAutoNumberTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\Type\AppExternalTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\Type\AppExternalUserTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\Type\AppFileTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\Type\AppImageResizeTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\Type\AppImageTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\Type\AppPhpClassTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\Type\AppPrefixAutoNumberTypeOrmModel;
use Nemundo\Admin\AppDesigner\Model\Model\Type\AppTextTypeOrmModel;
use Nemundo\Model\Collection\AbstractModelCollection;

class AppDesignerOrmCollection extends AbstractModelCollection
{

    protected function loadCollection()
    {

        // App
        $this->addModel(new AppOrmModel());

        // Model
        $this->addModel(new AppModelOrmModel());
        $this->addModel(new AppModelFieldOrmModel());
        $this->addModel(new AppModelFieldTypeOrmModel());
        $this->addModel(new AppModelDefaultTypeOrmModel());
        $this->addModel(new AppModelDefaultOrderTypeOrmModel());
        $this->addModel(new AppTemplateModelOrmModel());

        // Index
        $this->addModel(new AppModelIndexOrmModel());
        $this->addModel(new AppModelIndexTypeOrmModel());
        $this->addModel(new AppModelIndexFieldOrmModel());
        $this->addModel(new AppModelPrimaryIndexTypeOrmModel());

        // Type
        $this->addModel(new AppTextTypeOrmModel());
        $this->addModel(new AppExternalTypeOrmModel());
        $this->addModel(new AppExternalUserTypeOrmModel());
        $this->addModel(new AppPhpClassTypeOrmModel());
        $this->addModel(new AppAutoNumberTypeOrmModel());
        $this->addModel(new AppPrefixAutoNumberTypeOrmModel());
        $this->addModel(new AppFileTypeOrmModel());

        // Image
        $this->addModel(new AppImageTypeOrmModel());
        $this->addModel(new AppImageResizeTypeOrmModel());

        // Action
        /*$this->addModel(new AppActionOrmModel());
        $this->addModel(new AppActionTypeOrmModel());
        $this->addModel(new AppModelActionOrmModel());*/


    }

}