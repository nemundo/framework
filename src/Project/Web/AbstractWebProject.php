<?php

namespace Nemundo\Project\Web;


// AbstractWebHost
// AbstractWebPath
// AbstractWebDomain
use Nemundo\Core\Base\AbstractBase;

abstract class AbstractWebProject extends AbstractBase
{

    public $webPath;

    public $webUrl = '/';

    // loadProject
    abstract protected function loadWeb();

    public function __construct() {
        $this->loadWeb();
    }





}