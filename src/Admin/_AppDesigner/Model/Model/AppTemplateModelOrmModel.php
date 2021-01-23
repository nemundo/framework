<?php

namespace Nemundo\Admin\AppDesigner\Model\Model;

use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Model\Definition\Index\ModelUniqueIndex;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\Php\PhpClassOrmType;
use Nemundo\Orm\Type\Text\TextOrmType;

class AppTemplateModelOrmModel extends AbstractOrmModel
{

    /**
     * @var TextOrmType
     */
    public $templateLabel;

    /**
     * @var PhpClassOrmType
     */
    public $templateClass;


    protected function loadModel()
    {

        $this->label = 'Template Model';
        $this->tableName = 'app_template_model';
        $this->className = 'AppTemplateModel';
        $this->namespace = 'Nemundo\Admin\AppDesigner\Data\AppTemplateModel';
        $this->primaryIndex = new TextIdPrimaryIndex();

        $this->templateLabel = new TextOrmType($this);
        $this->templateLabel->label = 'Template';
        $this->templateLabel->fieldName = 'template';
        $this->templateLabel->variableName = 'template';
        $this->templateLabel->validation = true;

        $this->templateClass = new PhpClassOrmType($this);
        $this->templateClass->label = 'Template Class';
        $this->templateClass->fieldName = 'template_class';
        $this->templateClass->variableName = 'templateClass';
        $this->templateClass->phpClassName = AbstractOrmModel::class;

        $this->addDefaultType($this->templateLabel);
        $this->addDefaultOrderType($this->templateLabel);

        $index = new ModelUniqueIndex($this);
        $index->addType($this->templateClass);

    }

}