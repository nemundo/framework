<?php

namespace Nemundo\App\Application\Type;

use Nemundo\App\Application\Data\Application\ApplicationUpdate;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Model\Collection\AbstractModelCollection;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\Project\Install\AbstractUninstall;

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
    protected $installClass;

    /**
     * @var string
     */
    protected $uninstallClass;

    /**
     * @var string
     */
    //public $cleanClass;


    abstract protected function loadApplication();

    public function __construct()
    {
        $this->loadApplication();
    }


    public function getModelCollection()
    {


        $modelCollection = null;

        $className = $this->modelCollectionClass;
        if (class_exists($className)) {

            /** @var AbstractModelCollection $modelCollection */
            $modelCollection = new $className();
        }

        return $modelCollection;

    }


    public function hasInstall() {


        $value=false;
        if (class_exists($this->installClass)) {
            $value=true;
        }
        return $value;

    }



    public function installApp()
    {

        if ($this->hasInstall()) {  // class_exists($this->installClass)) {

            /** @var AbstractInstall $install */
            $install = new $this->installClass();
            $install->install();

            $update = new ApplicationUpdate();
            $update->install = true;
            $update->updateById($this->applicationId);


        } else {

            (new Debug())->write('No Install Class');

        }


    }


    public function hasUninstall() {

        $value=false;
        if (class_exists($this->uninstallClass)) {
            $value=true;
        }
        return $value;

    }


    public function uninstallApp()
    {

        if ($this->hasUninstall()) {

            /** @var AbstractUninstall $install */
            $install = new $this->uninstallClass();
            $install->uninstall();

            $update = new ApplicationUpdate();
            $update->install = false;
            $update->updateById($this->applicationId);


        } else {

            (new Debug())->write('No UnInstall Class');

        }

    }


}