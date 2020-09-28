<?php

namespace Nemundo\App\Application\Type;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Model\Collection\AbstractModelCollection;

abstract class AbstractApplication extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $applicationId;

    /**
     * @var string
     */
    public $application;

    /**
     * @var string
     */
    public $applicationName;

    /**
     * @var string
     */
    public $modelCollectionClass;

    /**
     * @var string
     */
    //public $installClass;

    /**
     * @var string
     */
    //public $uninstallClass;

    /**
     * @var string
     */
    //public $cleanClass;

    /**
     * @var string
     */
    //public $migrationClass;
    // migrationCollectionClass


    abstract protected function loadApplication();

    public function __construct()
    {
        $this->loadApplication();
    }



    public function getModelCollection() {


        $modelCollection=null;

        $className = $this->modelCollectionClass;
        if (class_exists($className)) {

            /** @var AbstractModelCollection $modelCollection */
            $modelCollection=new $className();
        }

        return $modelCollection;

    }


    /*
    public function installApp()
    {

    }


    public function uninstallApp()
    {

    }*/


}