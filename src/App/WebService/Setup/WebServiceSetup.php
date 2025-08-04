<?php

namespace Nemundo\App\WebService\Setup;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\WebService\Data\ServiceRequest\ServiceRequest;
use Nemundo\App\WebService\Data\ServiceRequest\ServiceRequestCount;
use Nemundo\App\WebService\Data\ServiceRequest\ServiceRequestUpdate;
use Nemundo\App\WebService\Service\AbstractWebService;
use Nemundo\Core\Base\AbstractBase;

class WebServiceSetup extends AbstractBase
{

    /**
     * @var AbstractApplication
     */
    private $application;


    public function __construct(?AbstractApplication $application = null)
    {
        $this->application = $application;
    }


    public function addService(AbstractWebService $serviceRequest)
    {

        $count = new ServiceRequestCount();
        $count->filter->andEqual($count->model->uniqueName, $serviceRequest->serviceName);

        if ($count->getCount() === 0) {

            $data = new ServiceRequest();
            $data->setupStatus = true;
            $data->uniqueName = $serviceRequest->serviceName;
            $data->phpClass = $serviceRequest->getClassName();

            if ($this->application !== null) {
                $data->applicationId = $this->application->applicationId;
            }

            $data->save();

        } else {

            $update = new ServiceRequestUpdate();
            $update->setupStatus = true;
            $update->phpClass = $serviceRequest->getClassName();

            if ($this->application !== null) {
                $update->applicationId = $this->application->applicationId;
            }

            $update->filter->andEqual($update->model->uniqueName, $serviceRequest->serviceName);
            $update->update();

        }

        return $this;

    }

}