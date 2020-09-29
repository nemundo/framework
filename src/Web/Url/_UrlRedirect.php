<?php

namespace Nemundo\Web\Url;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogConfig;


class _UrlRedirect extends AbstractBaseClass
{

    public function redirect($url)
    {

        if (!LogConfig::$errorMessageOccurs) {
            header('Location: ' . $url);
        }

        exit;

    }

}