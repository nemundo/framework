<?php

namespace Nemundo\Web\Controller;

use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Language\LanguageConfig;
use Nemundo\Web\Url\UrlParameterBuilder;

// AbstractTranslationWebController
abstract class AbstractLanguageWebController extends AbstractWebController
{

    public function __construct()
    {

        LanguageConfig::$multiLanguage = true;

        $url = new UrlParameterBuilder();
        $this->urlList = $url->getUrlList();

        //(new Debug())->write($this->urlList[0]);

        (new LanguageConfig())->setCurrentLanguage($this->urlList[0]);


        parent::__construct();

    }


    protected function loadUrlList()
    {

        $url = new UrlParameterBuilder();
        $this->urlList = $url->getUrlList();

        /*(new Debug())->write($this->urlList[0]);

        (new LanguageConfig())->setCurrentLanguage($this->urlList[0]);*/

        unset($this->urlList[0]);
        $this->urlList = array_values($this->urlList);

        if (sizeof($this->urlList) === 0) {
            $this->urlList[0] = '';
        }

    }

}