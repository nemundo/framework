<?php

namespace Nemundo\Admin\AppDesigner\Collection;


use Nemundo\Admin\AppDesigner\Data\App\AppModel;
use Nemundo\Admin\AppDesigner\Data\AppAutoNumberType\AppAutoNumberTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppExternalType\AppExternalTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppExternalUserType\AppExternalUserTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppFileType\AppFileTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppImageResizeType\AppImageResizeTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppImageType\AppImageTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelModel;
use Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType\AppModelDefaultOrderTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppModelDefaultType\AppModelDefaultTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldModel;
use Nemundo\Admin\AppDesigner\Data\AppModelFieldType\AppModelFieldTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexModel;
use Nemundo\Admin\AppDesigner\Data\AppModelIndexField\AppModelIndexFieldModel;
use Nemundo\Admin\AppDesigner\Data\AppModelIndexType\AppModelIndexTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType\AppModelPrimaryIndexTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppPhpClassType\AppPhpClassTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType\AppPrefixAutoNumberTypeModel;
use Nemundo\Admin\AppDesigner\Data\AppTemplateModel\AppTemplateModelModel;
use Nemundo\Admin\AppDesigner\Data\AppTextType\AppTextTypeModel;
use Nemundo\Model\Collection\AbstractModelCollection;

class AppDesignerCollection extends AbstractModelCollection
{

    protected function loadCollection()
    {

        // App
        $this->addModel(new AppModel());

        // Model
        $this->addModel(new AppModelModel());
        $this->addModel(new AppModelFieldModel());
        $this->addModel(new AppModelFieldTypeModel());
        $this->addModel(new AppModelDefaultTypeModel());
        $this->addModel(new AppModelDefaultOrderTypeModel());
        $this->addModel(new AppTemplateModelModel());

        // Index
        $this->addModel(new AppModelIndexModel());
        $this->addModel(new AppModelIndexTypeModel());
        $this->addModel(new AppModelIndexFieldModel());
        $this->addModel(new AppModelPrimaryIndexTypeModel());

        // Type
        $this->addModel(new AppTextTypeModel());
        $this->addModel(new AppExternalTypeModel());
        $this->addModel(new AppExternalUserTypeModel());
        $this->addModel(new AppPhpClassTypeModel());
        $this->addModel(new AppAutoNumberTypeModel());
        $this->addModel(new AppPrefixAutoNumberTypeModel());
        $this->addModel(new AppFileTypeModel());

        // Image
        $this->addModel(new AppImageTypeModel());
        $this->addModel(new AppImageResizeTypeModel());

        // Action
        /* $this->addModel(new AppActionModel());
         $this->addModel(new AppActionTypeModel());
         $this->addModel(new AppModelActionModel());*/

    }

}