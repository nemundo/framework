<?php

namespace Nemundo\App\ModelDesigner\Com\Dropdown;

use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\AppModelFieldType\AppModelFieldTypeReader;
use Nemundo\Admin\AppDesigner\Parameter\ModelFieldTypeParameter;
use Nemundo\Admin\AppDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Collection\TypeCollection;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Parameter\TypeParameter;
use Nemundo\App\ModelDesigner\Site\Type\TypeNewSite;
use Nemundo\Orm\Type\Text\TextOrmType;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;

class TypeDropdown extends BootstrapSiteDropdown
{

    /**
     * @var string
     */
    public $modelId;

    public function getContent()
    {


        foreach ((new TypeCollection())->getTypeCollection() as $type) {

            $site = clone(TypeNewSite::$site);
            $site->title =$type->typeLabel;
            $site->addParameter(new ProjectParameter());
            $site->addParameter(new AppParameter());
            $site->addParameter(new ModelParameter());
            $site->addParameter(new TypeParameter($type->typeName));
            $this->addSite($site);


        }




        //$this->addType('Text');
        //$this->addType('Number');

        //new TextOrmType()

        /*
        $site = clone(TypeNewSite::$site);
        $site->title ='Text';
        //$site->addParameter(new ModelParameter($this->modelId));
        //$site->addParameter(new ModelFieldTypeParameter($fieldTypeRow->id));
        $this->addSite($site);

        $site = clone(TypeNewSite::$site);
        $site->title ='Number';
        //$site->addParameter(new ModelParameter($this->modelId));
        //$site->addParameter(new ModelFieldTypeParameter($fieldTypeRow->id));
        $this->addSite($site);


        /*
        $reader = new AppModelFieldTypeReader();
        $reader->connection = new AppDesignerConnection();
        $reader->addOrder($reader->model->fieldType);

        foreach ($reader->getData() as $fieldTypeRow) {
            $site = clone(AppDesignerConfig::$site->app->appModel->fieldNew);
            $site->title = $fieldTypeRow->fieldType;
            $site->addParameter(new ModelParameter($this->modelId));
            $site->addParameter(new ModelFieldTypeParameter($fieldTypeRow->id));
            $this->addSite($site);
        }*/

        return parent::getContent();

    }



    private function addType($type) {

        $site = clone(TypeNewSite::$site);
        $site->title =$type;
        $site->addParameter(new ProjectParameter());
        $site->addParameter(new AppParameter());
        $site->addParameter(new ModelParameter());
        $this->addSite($site);

    }

}