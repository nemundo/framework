<?php

namespace Nemundo\Web\Site;


abstract class AbstractWildcardSite extends AbstractSite
{

    /**
     * @var string
     */
    public $wildcardUrl;

    abstract function checkWildcardUrl();

    protected function loadSite()
    {
        //$this->menuActive = false;
    }

}