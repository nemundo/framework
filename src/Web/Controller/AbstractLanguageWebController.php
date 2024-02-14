<?php

namespace Nemundo\Web\Controller;

use Nemundo\Core\Http\Url\UrlRedirect;
use Nemundo\Core\Language\LanguageConfig;
use Nemundo\Web\Url\UrlParameterBuilder;
use Nemundo\Web\WebConfig;

// AbstractTranslationWebController
abstract class AbstractLanguageWebController extends AbstractWebController
{

    public function __construct()
    {

        LanguageConfig::$multiLanguage = true;

        $url = new UrlParameterBuilder();
        $this->urlList = $url->getUrlList();

        $languageCode = $this->urlList[0];
        if (!in_array($languageCode, LanguageConfig::$languageList)) {
            $url = WebConfig::$webUrl . LanguageConfig::$defaultLanguageCode;
            (new UrlRedirect())->redirect($url);
        }
        (new LanguageConfig())->setCurrentLanguage($languageCode);

        parent::__construct();

    }


    protected function loadUrlList()
    {

        $url = new UrlParameterBuilder();
        $this->urlList = $url->getUrlList();

        unset($this->urlList[0]);
        $this->urlList = array_values($this->urlList);

        if (sizeof($this->urlList) === 0) {
            $this->urlList[0] = '';
        }

    }

}