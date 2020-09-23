<?php

namespace Nemundo\App\Application\Setup;


use Nemundo\App\Application\Data\Application\Application;
use Nemundo\App\Application\Data\Application\ApplicationDelete;
use Nemundo\App\Application\Data\Application\ApplicationUpdate;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class ApplicationSetup extends AbstractBase
{

    public function addApplication(AbstractApplication $application)
    {

        $data = new Application();
        $data->updateOnDuplicate = true;
        $data->id = $application->applicationId;
        $data->application = $application->application;
        $data->applicationClass = $application->getClassName();
        $data->setupStatus = true;
        $data->save();

        return $this;

    }


    public function removeApplication(AbstractApplication $application)
    {

        (new ApplicationDelete())->deleteById($application->applicationId);

    }


    public function resetSetupStatus()
    {

        $update = new ApplicationUpdate();
        $update->setupStatus = false;
        $update->update();

    }


    public function removeUnusedApplication()
    {

        $delete = new ApplicationDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

    }

}