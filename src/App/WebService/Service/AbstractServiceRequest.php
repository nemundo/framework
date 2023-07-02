<?php

namespace Nemundo\App\WebService\Service;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Json\Response\JsonResponse;


abstract class AbstractServiceRequest extends AbstractBaseClass
{

    public $serviceName;

    public $restrictedService = false;

    /**
     * @var JsonResponse
     */
    private $response;


    abstract protected function loadService();

    public function __construct()
    {

        $this->loadService();
        $this->response = new JsonResponse();

    }

    abstract public function onRequest();


    protected function addRow($row)
    {

        $this->response->addRow($row);
        return $this;

    }


    protected function setData($data)
    {

        $this->response->setData($data);
        return $this;

    }


    protected function sendStatus($id, $status)
    {

        $row = [];
        $row['service'] = $this->serviceName;
        $row['id'] = $id;
        $row['status'] = $status;

        $this->addRow($row);

    }


    protected function sendOkStatus($id = 0)
    {

        $row = [];
        $row['service'] = $this->serviceName;
        $row['status'] = 'OK';
        $row['id'] = $id;

        $this->addRow($row);

    }


    public function render()
    {

        $this->response->render();

    }

}