<?php

namespace Nemundo\Admin\AppDesigner\Factory;


use Nemundo\Admin\AppDesigner\Data\App\AppReader;
use Nemundo\Admin\AppDesigner\Data\AppModel\AppModelReader;
use Nemundo\Admin\AppDesigner\Data\AppModelField\AppModelFieldReader;
use Nemundo\Admin\AppDesigner\Data\AppModelFieldType\AppModelFieldTypeReader;
use Nemundo\Admin\AppDesigner\Data\AppModelIndex\AppModelIndexReader;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelFieldParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelFieldTypeParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelIndexParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;

class RowFactory extends AbstractBase
{

    /**
     * @var SqLiteConnection
     */
    public $connection;

    public function getAppRow($appId = null)
    {
        if ($appId == null) {
            $appId = (new AppParameter())->getValue();
        }
        $appReader = new AppReader();
        $appReader->connection = $this->connection;
        $appRow = $appReader->getRowById($appId);
        return $appRow;
    }


    public function getModelRow($modelId = null)
    {
        if ($modelId == null) {
            $modelId = (new ModelParameter())->getValue();
        }
        $modelReader = new AppModelReader();
        $modelReader->connection = $this->connection;
        $modelReader->filter->andEqual($modelReader->model->id, $modelId);
        $modelReader->model->loadModelPrimaryIndex();
        $modelReader->model->loadApp();
        $modelRow = $modelReader->getRowById($modelId);

        return $modelRow;
    }


    public function getModelFieldRow()
    {

        $fieldId = (new ModelFieldParameter())->getValue();

        $fieldReader = new AppModelFieldReader();
        $fieldReader->connection = $this->connection;
        $fieldReader->model->loadAppFieldType();
        $fieldRow = $fieldReader->getRowById($fieldId);
        return $fieldRow;
    }


    public function getModelFieldTypeRow()
    {
        $typeId = (new ModelFieldTypeParameter())->getValue();
        $typeReader = new AppModelFieldTypeReader();
        $typeReader->connection = $this->connection;
        $typeRow = $typeReader->getRowById($typeId);
        return $typeRow;
    }


    public function getModelIndexRow()
    {

        $indexId = (new ModelIndexParameter())->getValue();

        $indexReader = new AppModelIndexReader();
        $indexReader->connection = $this->connection;
        $indexReader->model->loadAppModel();
        $indexReader->model->appModel->loadApp();
        $indexRow = $indexReader->getRowById($indexId);

        return $indexRow;

    }

}