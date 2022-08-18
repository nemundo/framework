<?php

namespace Nemundo\App\WebService\Setup;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\WebService\Data\ServiceRequest\ServiceRequest;
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

        $data = new ServiceRequest();
        $data->updateOnDuplicate = true;
        $data->setupStatus=true;
        $data->uniqueName = $serviceRequest->serviceName;
        $data->phpClass = $serviceRequest->getClassName();

        if ($this->application !== null) {
            $data->applicationId = $this->application->applicationId;
        }

        $data->save();

        return $this;

    }

}