<?php


namespace Nemundo\App\Apache\Service;


use Nemundo\App\Linux\Service\AbstractService;

class ApacheService extends AbstractService
{

   protected function loadService()
   {
       $this->serviceName='apache2';
       // TODO: Implement loadService() method.
   }

}