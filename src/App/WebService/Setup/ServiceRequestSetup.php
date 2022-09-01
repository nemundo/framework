<?php

namespace Nemundo\App\WebService\Setup;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\WebService\Data\ServiceRequest\ServiceRequest;
use Nemundo\App\WebService\Data\ServiceRequest\ServiceRequestCount;
use Nemundo\App\WebService\Data\ServiceRequest\ServiceRequestUpdate;
use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Core\Base\AbstractBase;

class ServiceRequestSetup extends AbstractBase
{

    /**
     * @var AbstractApplication
     */
    private $application;


    public function __construct(AbstractApplication $application = null)
    {
        $this->application = $application;
    }


    public function addService(AbstractServiceRequest $serviceRequest)
    {

        $count = new ServiceRequestCount();
        $count->filter->andEqual($count->model->uniqueName, $serviceRequest->serviceName);

        if ($count->getCount()===0) {

        $data = new ServiceRequest();
        //$data->updateOnDuplicate = true;
        $data->setupStatus=true;
        $data->uniqueName = $serviceRequest->serviceName;
        $data->phpClass = $serviceRequest->getClassName();

        if ($this->application !== null) {
            $data->applicationId = $this->application->applicationId;
        }

        $data->save();

        } else {

            $update = new ServiceRequestUpdate();
            //$data->updateOnDuplicate = true;
            $update->setupStatus=true;
            //$update->uniqueName = $serviceRequest->serviceName;
            $update->phpClass = $serviceRequest->getClassName();

            if ($this->application !== null) {
                $update->applicationId = $this->application->applicationId;
            }

            //$update->uniqueName = $serviceRequest->serviceName;
            $update->filter->andEqual($update->model->uniqueName,$serviceRequest->serviceName);
            $update->update();  // updateById()save();

        }

        return $this;

    }

}