<?php

namespace Nemundo\App\Application\Service;

use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\WebService\Service\AbstractListServiceRequest;

class ApplicationSearchService extends AbstractListServiceRequest
{

    protected function loadService()
    {
        $this->serviceName='application-application-search';
        // TODO: Implement loadServiceRequest() method.
    }


    public function onRequest()
    {


        $reader=new ApplicationReader();

        $reader->addOrder($reader->model->application);

        foreach ($reader->getData() as $applicationRow) {

            $data=[];
            $data['id']=$applicationRow->id;
            $data['application']=$applicationRow->application;

            $this->addRow($data);


        }

        // TODO: Implement onRequest() method.
    }


}