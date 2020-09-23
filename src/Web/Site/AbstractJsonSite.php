<?php

namespace Nemundo\Web\Site;


use Nemundo\Core\Json\Document\JsonResponse;

abstract class AbstractJsonSite extends AbstractSite
{

    /**
     * @var JsonResponse
     */
    private $json;

    abstract protected function loadJson();

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->menuActive = false;
        $this->title = 'Json Response';
        $this->url = 'json';
        parent::__construct($site);


        $this->json = new JsonResponse();

    }


    protected function loadSite()
    {

    }


    // protected
    public function addJsonRow($data) {
        $this->json->addRow($data);
    }


    public function loadContent()
    {

        $this->loadJson();
        $this->json->render();

    }


}