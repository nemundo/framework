<?php

namespace Nemundo\Admin\AppDesigner\Orm;

use Nemundo\Admin\AppDesigner\Data\AppAutoNumberType\AppAutoNumberTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppExternalType\AppExternalTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppExternalUserType\AppExternalUserTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppFileType\AppFileTypeCount;
use Nemundo\Admin\AppDesigner\Data\AppFileType\AppFileTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppImageType\AppImageTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelReader;
use Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType\AppModelDefaultOrderTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppModelDefaultType\AppModelDefaultTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldReader;
use Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexReader;
use Nemundo\Admin\AppDesigner\Data\AppModelIndexField\AppModelIndexFieldReader;
use Nemundo\Admin\AppDesigner\Data\AppPhpClassType\AppPhpClassTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType\AppPrefixAutoNumberTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppTextType\AppTextTypeReader;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Index\AutoIncrementIdPrimaryIndex;
use Nemundo\Db\Index\NumberIdPrimaryIndex;
use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;
use Nemundo\Dev\Code\PrefixPhpClassTrait;
use Nemundo\Model\Definition\Index\AbstractModelIndex;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\External\ExternalType;
use Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixHeightModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\File\FileOrmType;
use Nemundo\Orm\Type\File\ImageOrmType;
use Nemundo\Orm\Type\Number\AutoNumberOrmType;
use Nemundo\Orm\Type\Number\PrefixAutoNumberOrmType;
use Nemundo\Orm\Type\OrmTypeTrait;
use Nemundo\Orm\Type\Php\PhpClassOrmType;
use Nemundo\Orm\Type\Text\TextOrmType;
use Nemundo\Orm\Type\User\CreatedUserOrmType;
use Nemundo\Orm\Type\User\ModifiedUserOrmType;
use Nemundo\Orm\Type\User\UserOrmType;

class AppDesignerOrmModelFactory extends AbstractBase
{

    use PrefixPhpClassTrait;

    /**
     * @var SqLiteConnection
     */
    public $connection;

    public function getOrmModelClass($modelId)
    {

        $modelReder = new AppModelReader();
        $modelReder->connection = $this->connection;
        $modelRow = $modelReder->getRowById($modelId);

        $ormModel = $modelRow->templateModel->getTemplateClassObject();

        if ($ormModel == null) {
            (new LogMessage())->writeError('No Template Model. Namespace: ' . $modelRow->modelNamespace);
            exit;
        }

        $ormModel->namespace = $modelRow->modelNamespace;
        $ormModel->className = $modelRow->modelClassName . 'Model';
        $ormModel->tableName = $modelRow->modelTableName;
        $ormModel->label = $modelRow->modelLabel;
        $ormModel->className = $modelRow->modelClassName;
        $ormModel->rowClassName = $modelRow->rowClassName;
        $ormModel->createAdminOrm = $modelRow->modelCreateAdminOrm;

        switch ($modelRow->modelPrimaryIndexId) {

            case (new AutoIncrementIdPrimaryIndex)->primaryIndexId:
                $ormModel->primaryIndex = new AutoIncrementIdPrimaryIndex();
                break;

            case (new UniqueIdPrimaryIndex())->primaryIndexId:
                $ormModel->primaryIndex = new UniqueIdPrimaryIndex();
                break;

            case (new NumberIdPrimaryIndex())->primaryIndexId:
                $ormModel->primaryIndex = new NumberIdPrimaryIndex();
                break;

            case (new TextIdPrimaryIndex())->primaryIndexId:
                $ormModel->primaryIndex = new TextIdPrimaryIndex();
                break;

        }

        $fieldReader = new AppModelFieldReader();
        $fieldReader->connection = $this->connection;
        $fieldReader->model->loadAppFieldType();
        $fieldReader->filter->andEqual($fieldReader->model->active, true);
        $fieldReader->filter->andEqual($fieldReader->model->appModelId, $modelId);

        $typeList = [];

        foreach ($fieldReader->getData() as $fieldRow) {

            /** @var AbstractModelType $type */
            $type = null;

            $modelClassName = $fieldRow->appFieldType->fieldClassName;

            /** @var AbstractModelType|ExternalType|OrmTypeTrait|PrefixAutoNumberOrmType|TextOrmType|FileOrmType|ExternalOrmType|PhpClassOrmType $type */
            $type = new $modelClassName($ormModel);

            $type->model = $ormModel;
            $type->variableName = $fieldRow->appFieldVariableName;
            $type->fieldName = $fieldRow->appFieldName;
            $type->label = $fieldRow->appFieldLabel;

            if ($fieldRow->appFieldType->fieldClassName == ExternalOrmType::class) {

                $externalTypeReader = new AppExternalTypeReader();
                $externalTypeReader->connection = $this->connection;
                $externalTypeReader->filter->andEqual($externalTypeReader->model->appFieldId, $fieldRow->id);
                $externalTypeReader->model->loadExternalModel();
                $externalTypeReaderRow = $externalTypeReader->getRow();

                $type->externalClassName = $externalTypeReaderRow->externalModel->modelNamespace . '\\' . $externalTypeReaderRow->externalModel->modelClassName;
                $type->loadModel = $externalTypeReaderRow->appLoadModel;
                $type->rowClassName = $externalTypeReaderRow->externalModel->rowClassName;

            }


            if ($fieldRow->appFieldType->fieldClassName == UserOrmType::class ||
                $fieldRow->appFieldType->fieldClassName == CreatedUserOrmType::class ||
                $fieldRow->appFieldType->fieldClassName == ModifiedUserOrmType::class
            ) {

                $externalTypeReader = new AppExternalUserTypeReader();
                $externalTypeReader->connection = $this->connection;
                $externalTypeReader->filter->andEqual($externalTypeReader->model->appFieldId, $fieldRow->id);
                $externalTypeReaderRow = $externalTypeReader->getRow();

                $type->loadModel = $externalTypeReaderRow->appLoadModel;

            }


            if ($fieldRow->appFieldType->fieldClassName == TextOrmType::class) {
                $reader = new AppTextTypeReader();
                $reader->connection = $this->connection;
                $reader->filter->andEqual($reader->model->appFieldId, $fieldRow->id);

                $type->length = $reader->getRow()->length;
            }

            if ($fieldRow->appFieldType->fieldClassName == AutoNumberOrmType::class) {
                $reader = new AppAutoNumberTypeReader();
                $reader->connection = $this->connection;
                $reader->filter->andEqual($reader->model->appFieldId, $fieldRow->id);

                $type->startNumber = $reader->getRow()->startNumber;
            }

            if ($fieldRow->appFieldType->fieldClassName == PrefixAutoNumberOrmType::class) {
                $reader = new AppPrefixAutoNumberTypeReader();
                $reader->connection = $this->connection;
                $reader->filter->andEqual($reader->model->appFieldId, $fieldRow->id);
                $row = $reader->getRow();

                $type->prefix = $row->prefix;
                $type->startNumber = $row->startNumber;
            }

            if ($fieldRow->appFieldType->fieldClassName == PhpClassOrmType::class) {
                $typeReader = new AppPhpClassTypeReader();
                $typeReader->connection = $this->connection;
                $typeReader->filter->andEqual($typeReader->model->appFieldId, $fieldRow->id);

                $type->phpClassName = $typeReader->getRow()->phpClassName;
            }

            if ($fieldRow->appFieldType->fieldClassName == FileOrmType::class) {

                $type->keepOrginalFilename = false;

                $count = new AppFileTypeCount();
                $count->connection = $this->connection;
                $count->filter->andEqual($count->model->appFieldId, $fieldRow->id);
                if ($count->getCount() > 0) {
                    $textTypeReader = new AppFileTypeReader();
                    $textTypeReader->connection = $this->connection;
                    $textTypeReader->filter->andEqual($textTypeReader->model->appFieldId, $fieldRow->id);
                    $textTypeRow = $textTypeReader->getRow();
                    $type->keepOrginalFilename = $textTypeRow->keepOrginalFilename;
                }

            }

            if ($fieldRow->appFieldType->fieldClassName == ImageOrmType::class) {

                $imageTypeReader = new AppImageTypeReader();
                $imageTypeReader->connection = $this->connection;
                $imageTypeReader->model->loadResizeType();
                $imageTypeReader->filter->andEqual($imageTypeReader->model->appFieldId, $fieldRow->id);

                foreach ($imageTypeReader->getData() as $imageTypeRow) {

                    switch ($imageTypeRow->resizeTypeId) {

                        case (new FixWidthModelModelImageFormat())->imageFormatId:

                            $format = new FixWidthModelModelImageFormat($type);
                            $format->width = $imageTypeRow->size;

                            break;

                        case (new FixHeightModelImageFormat())->imageFormatId:

                            $format = new FixHeightModelImageFormat($type);
                            $format->height = $imageTypeRow->size;

                            break;

                        case (new AutoSizeModelImageFormat())->imageFormatId:

                            $format = new AutoSizeModelImageFormat($type);
                            $format->size = $imageTypeRow->size;

                            break;


                    }

                }

            }


            if ($fieldRow->appAllowNullValue) {
                $type->allowNullValue = true;
            }

            if ($fieldRow->appFieldValidation) {
                $type->validation = true;
            }

            if (!$fieldRow->formVisible) {
                $type->visible->form = false;
            }

            if (!$fieldRow->tableVisible) {
                $type->visible->table = false;
            }

            if (!$fieldRow->viewVisible) {
                $type->visible->view = false;
            }

            $typeList[$fieldRow->id] = $type;

        }


        // Index
        $indexReader = new AppModelIndexReader();
        $indexReader->connection = $this->connection;
        $indexReader->filter->andEqual($indexReader->model->appModelId, $modelId);
        $indexReader->model->loadIndexType();
        foreach ($indexReader->getData() as $indexRow) {

            $modelClassName = $this->prefixClassName($indexRow->indexType->indexTypeClassName);

            /** @var AbstractModelIndex $index */
            $index = new $modelClassName($ormModel);

            $indexFieldReader = new AppModelIndexFieldReader();
            $indexFieldReader->connection = $this->connection;
            $indexFieldReader->filter->andEqual($indexFieldReader->model->appIndexId, $indexRow->id);
            $indexFieldReader->model->loadAppField();
            $indexFieldReader->model->appField->loadAppFieldType();
            foreach ($indexFieldReader->getData() as $indexFieldRow) {
                $index->addType($typeList[$indexFieldRow->appFieldId]);
            }

        }


        // Default Type
        $defaultTypeReader = new AppModelDefaultTypeReader();
        $defaultTypeReader->connection = $this->connection;
        $defaultTypeReader->filter->andEqual($defaultTypeReader->model->appModelId, $modelId);
        foreach ($defaultTypeReader->getData() as $defaultTypeRow) {
            $ormModel->addDefaultType($typeList[$defaultTypeRow->appFieldId]);
        }

        // Default Order Type
        $defaultOrderTypeReader = new AppModelDefaultOrderTypeReader();
        $defaultOrderTypeReader->connection = $this->connection;
        $defaultOrderTypeReader->filter->andEqual($defaultOrderTypeReader->model->appModelId, $modelId);
        foreach ($defaultOrderTypeReader->getData() as $defaultOrderTypeRow) {
            $ormModel->addDefaultOrderType($typeList[$defaultOrderTypeRow->appFieldId]);
        }

        // Action
        /*$modelActionReader = new AppModelActionReader();
        $modelActionReader->connection = $this->connection;
        $modelActionReader->filter->andEqual($modelActionReader->model->appModelId, $modelId);

        foreach ($modelActionReader->getData() as $modelActionRow) {

            $action = $modelActionRow->appAction->getActionClassObject();

            switch ($modelActionRow->actionTypeId) {

                case (new InsertActionType())->id:
                    $ormModel->action->addInsertAction($action);
                    break;

                case (new UpdateBeforeActionType())->id:
                    //$function->add('$this->addBeforeUpdateAction();');
                    break;

                case (new UpdateAfterActionType())->id:
                    //$function->add('$this->addAfterUpdateAction();');
                    break;

                case (new DeleteBeforeActionType())->id:
                    //$function->add('$this->addBeforeDeleteAction();');
                    break;

                case (new DeleteAfterActionType())->id:
                    //$function->add('$this->addAfterDeleteAction();');
                    break;

            }


        }*/

        return $ormModel;

    }

}
