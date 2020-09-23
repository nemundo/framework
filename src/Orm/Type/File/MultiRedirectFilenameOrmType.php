<?php

namespace Nemundo\Orm\Type\File;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Model\Data\Property\File\MultiRedirectFilenameDataProperty;
use Nemundo\Model\Reader\Property\File\MultiRedirectFilenameReaderProperty;
use Nemundo\Model\Type\File\MultiRedirectFilenameType;
use Nemundo\Orm\Type\OrmTypeTrait;
use Nemundo\Orm\Utility\RedirectVariableName;

class MultiRedirectFilenameOrmType extends MultiRedirectFilenameType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Multi Redirect Filename';
        $this->typeId = 'ec3b007d-a34b-42a2-a440-ddb9dbba161e';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, MultiRedirectFilenameType::class);

        $variableName = new RedirectVariableName();
        $variableName->model = $this->model;
        $variableName->type = $this;
        $registerVariableName = $variableName->getVariableName();

        $phpFunction->add('$this->' . $this->variableName . '->redirectSite = \\' . $this->model->namespace . '\\Redirect\\' . $this->model->className . 'RedirectConfig::$' . $registerVariableName . ';');

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, MultiRedirectFilenameType::class);

    }

    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addDataProperty($phpClass, MultiRedirectFilenameDataProperty::class);

    }

    public function getDataAfterSaveCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $phpFunction->add('$this->' . $this->variableName . '->saveData($id);');

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $this->addRowProperty($phpClass, MultiRedirectFilenameReaderProperty::class);

    }


}