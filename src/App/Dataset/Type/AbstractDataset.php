<?php

namespace Nemundo\App\Dataset\Type;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Web\Site\AbstractSite;

abstract class AbstractDataset extends AbstractBaseClass
{

    public $dataset;

    public $description;

    public $url;

    public $documentationUrl;

    public $licence;

    public $licenceUrl;

    public $useCommercialPurpose = false;

    public $category;

    public $organisation;

    public $dateOfPublication;


    protected $dataContainerClass;


    /**
     * @var AbstractSite
     */
    public $site;


    abstract protected function loadDataset();

    public function __construct()
    {

        $this->loadDataset();

    }


    public function hasDataContainer() {

        $value = false;
        if ($this->dataContainerClass !==null) {
            $value=true;
        }

        return $value;

    }


    public function getDataContainer() {

        $className = $this->dataContainerClass;

        /** @var AbstractContainer $container */
        $container = new $className();

        return $container;

    }



}