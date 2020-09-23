<?php

namespace Nemundo\Admin\AppDesigner\Install;



use Nemundo\Admin\AppDesigner\Collection\AppDesignerCollection;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;

use Nemundo\Admin\AppDesigner\Data\AppImageResizeType\AppImageResizeType;
use Nemundo\Admin\AppDesigner\Data\AppImageResizeType\AppImageResizeTypeCount;
use Nemundo\Admin\AppDesigner\Data\AppImageResizeType\AppImageResizeTypeUpdate;
use Nemundo\Admin\AppDesigner\Data\AppModelIndexType\AppModelIndexType;
use Nemundo\Admin\AppDesigner\Data\AppModelIndexType\AppModelIndexTypeCount;
use Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType\AppModelPrimaryIndexType;
use Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType\AppModelPrimaryIndexTypeCount;
use Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType\AppModelPrimaryIndexTypeUpdate;
use Nemundo\Admin\AppDesigner\Setup\OrmTypeSetup;
use Nemundo\Admin\AppDesigner\Setup\TemplateModelSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Index\AbstractPrimaryIndex;
use Nemundo\Db\Index\AutoIncrementIdPrimaryIndex;
use Nemundo\Db\Index\NumberIdPrimaryIndex;
use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Model\Definition\Index\AbstractModelIndex;
use Nemundo\Model\Definition\Index\ModelIndex;
use Nemundo\Model\Definition\Index\ModelSearchIndex;
use Nemundo\Model\Definition\Index\ModelUniqueIndex;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Model\Type\ImageFormat\AbstractModelImageFormat;
use Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixHeightModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat;
use Nemundo\Orm\Model\Template\ActiveOrmModel;
use Nemundo\Orm\Model\Template\DefaultOrmModel;
use Nemundo\Orm\Type\DateTime\CreatedDateTimeOrmType;
use Nemundo\Orm\Type\DateTime\DateOrmType;
use Nemundo\Orm\Type\DateTime\DateTimeOrmType;
use Nemundo\Orm\Type\DateTime\ModifiedDateTimeOrmType;
use Nemundo\Orm\Type\DateTime\TimeOrmType;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\File\AudioOrmType;
use Nemundo\Orm\Type\File\FileOrmType;
use Nemundo\Orm\Type\File\ImageCroppingOrmType;
use Nemundo\Orm\Type\File\ImageOrmType;
use Nemundo\Orm\Type\File\MultiFileOrmType;
use Nemundo\Orm\Type\File\MultiImageOrmType;
use Nemundo\Orm\Type\File\MultiRedirectFilenameOrmType;
use Nemundo\Orm\Type\File\RedirectFilenameOrmType;
use Nemundo\Orm\Type\File\RedirectFileOrmType;
use Nemundo\Orm\Type\File\VideoOrmType;
use Nemundo\Orm\Type\Geo\GeoCoordinateAltitudeOrmType;
use Nemundo\Orm\Type\Geo\GeoCoordinateOrmType;
use Nemundo\Orm\Type\Id\UniqueIdOrmType;
use Nemundo\Orm\Type\Number\AutoNumberOrmType;
use Nemundo\Orm\Type\Number\DecimalNumberOrmType;
use Nemundo\Orm\Type\Number\ItemOrderOrmType;
use Nemundo\Orm\Type\Number\NumberOrmType;
use Nemundo\Orm\Type\Number\PrefixAutoNumberOrmType;
use Nemundo\Orm\Type\Number\YesNoOrmType;
use Nemundo\Orm\Type\Php\PhpClassOrmType;
use Nemundo\Orm\Type\Text\LargeTextOrmType;
use Nemundo\Orm\Type\Text\TextOrmType;
use Nemundo\Orm\Type\User\CreatedUserOrmType;
use Nemundo\Orm\Type\User\ModifiedUserOrmType;
use Nemundo\Orm\Type\User\UserOrmType;
use Nemundo\Orm\Type\Web\EmailOrmType;
use Nemundo\Orm\Type\Web\PhoneOrmType;
use Nemundo\Orm\Type\Web\UrlOrmType;
use Nemundo\User\Orm\UserOrmModel;

class AppDesignerInstall extends AbstractScript
{


    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->connection = new AppDesignerConnection();
        $setup->addCollection(new AppDesignerCollection());

        $setup = new OrmTypeSetup();

        $setup->addOrmType(new TextOrmType());
        $setup->addOrmType(new LargeTextOrmType());

        $setup->addOrmType(new EmailOrmType());
        $setup->addOrmType(new UrlOrmType());
        $setup->addOrmType(new PhoneOrmType());

        $setup->addOrmType(new NumberOrmType());
        $setup->addOrmType(new DecimalNumberOrmType());
        $setup->addOrmType(new YesNoOrmType());
        $setup->addOrmType(new ItemOrderOrmType());
        $setup->addOrmType(new AutoNumberOrmType());
        $setup->addOrmType(new PrefixAutoNumberOrmType());

        $setup->addOrmType(new DateTimeOrmType());
        $setup->addOrmType(new DateOrmType());
        $setup->addOrmType(new TimeOrmType());
        $setup->addOrmType(new CreatedDateTimeOrmType());
        $setup->addOrmType(new ModifiedDateTimeOrmType());

        $setup->addOrmType(new FileOrmType());
        $setup->addOrmType(new RedirectFileOrmType());
        $setup->addOrmType(new RedirectFilenameOrmType());
        $setup->addOrmType(new MultiRedirectFilenameOrmType());
        $setup->addOrmType(new ImageOrmType());
        $setup->addOrmType(new MultiFileOrmType());
        $setup->addOrmType(new MultiImageOrmType());
        $setup->addOrmType(new AudioOrmType());
        $setup->addOrmType(new VideoOrmType());
        $setup->addOrmType(new ImageCroppingOrmType());

        $setup->addOrmType(new GeoCoordinateOrmType());
        $setup->addOrmType(new GeoCoordinateAltitudeOrmType());

        $setup->addOrmType(new UniqueIdOrmType());
        $setup->addOrmType(new ExternalOrmType());

        $setup->addOrmType(new UserOrmType());
        $setup->addOrmType(new CreatedUserOrmType());
        $setup->addOrmType(new ModifiedUserOrmType());

        $setup->addOrmType(new PhpClassOrmType());

        // Index
        $this->addIndex(new ModelIndex());
        $this->addIndex(new ModelUniqueIndex());
        $this->addIndex(new ModelSearchIndex());

        // Primary Index
        $this->addPrimaryIndex(new AutoIncrementIdPrimaryIndex());
        $this->addPrimaryIndex(new UniqueIdPrimaryIndex());
        $this->addPrimaryIndex(new NumberIdPrimaryIndex());
        $this->addPrimaryIndex(new TextIdPrimaryIndex());

        // Image Resize Type
        $this->addImageResizeType(new FixWidthModelModelImageFormat());
        $this->addImageResizeType(new FixHeightModelImageFormat());
        $this->addImageResizeType(new AutoSizeModelImageFormat());

        $setup = new TemplateModelSetup();
        $setup->addTemplateModel(new DefaultOrmModel());
        $setup->addTemplateModel(new ActiveOrmModel());
        $setup->addTemplateModel(new UserOrmModel());

        /*
        $this->addActionType(new InsertActionType());
        $this->addActionType(new UpdateBeforeActionType());
        $this->addActionType(new UpdateAfterActionType());
        $this->addActionType(new DeleteBeforeActionType());
        $this->addActionType(new DeleteAfterActionType());*/

    }


    private function addIndex(AbstractModelIndex $index)
    {

        $count = new AppModelIndexTypeCount();
        $count->connection = new AppDesignerConnection();
        $count->filter->andEqual($count->model->indexTypeClassName, $index->getClassName());

        if ($count->getCount() == 0) {
            $data = new AppModelIndexType();
            $data->connection = new AppDesignerConnection();
            $data->id = $index->indexId;
            $data->indexType = $index->getClassNameWithoutNamespace();
            $data->indexTypeClassName = $index->getClassName();
            $data->save();
        }

    }


    private function addPrimaryIndex(AbstractPrimaryIndex $primaryIndex)
    {

        $count = new AppModelPrimaryIndexTypeCount();
        $count->connection = new AppDesignerConnection();
        $count->filter->andEqual($count->model->id, $primaryIndex->primaryIndexId);

        if ($count->getCount() == 0) {
            $data = new AppModelPrimaryIndexType();
            $data->connection = new AppDesignerConnection();
            $data->id = $primaryIndex->primaryIndexId;
            $data->indexType = $primaryIndex->primaryIndexLabel;
            $data->save();
        } else {
            $update = new AppModelPrimaryIndexTypeUpdate();
            $update->connection = new AppDesignerConnection();
            $update->indexType = $primaryIndex->primaryIndexLabel;
            $update->updateById($primaryIndex->primaryIndexId);
        }

    }


    /*
    private function addActionType(AbstractActionType $actionType)
    {

        $count = new AppActionTypeCount();
        $count->connection = new AppDesignerConnection();
        $count->filter->andEqual($count->model->id, $actionType->id);

        if ($count->getCount() == 0) {
            $data = new AppActionType();
            $data->connection = new AppDesignerConnection();
            $data->id = $actionType->id;
            $data->actionType = $actionType->actionType;
            $data->actionTypeClass = $actionType->getClassName();
            $data->save();
        } else {
            $update = new AppActionTypeUpdate();
            $update->connection = new AppDesignerConnection();
            $update->actionType = $actionType->actionType;
            $update->actionTypeClass = $actionType->getClassName();
            $update->updateById($actionType->id);
        }

    }*/


    private function addImageResizeType(AbstractModelImageFormat $imageFormat)
    {

        $count = new AppImageResizeTypeCount();
        $count->connection = new AppDesignerConnection();
        $count->filter->andEqual($count->model->id, $imageFormat->imageFormatId);

        if ($count->getCount() == 0) {
            $data = new AppImageResizeType();
            $data->connection = new AppDesignerConnection();
            $data->id = $imageFormat->imageFormatId;
            $data->resizeType = $imageFormat->imageFormatLabel;
            $data->save();
        } else {
            $update = new AppImageResizeTypeUpdate();
            $update->connection = new AppDesignerConnection();
            $update->resizeType = $imageFormat->imageFormatLabel;
            $update->updateById($imageFormat->imageFormatId);
        }

    }

}