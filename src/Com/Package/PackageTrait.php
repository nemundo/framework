<?php

namespace Nemundo\Com\Package;


use Nemundo\Html\Header\LibraryHeader;
use Nemundo\Html\Header\StylesheetLink;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Web\WebConfig;

trait PackageTrait
{

    public function addPackage(AbstractPackage $package)
    {

        foreach ($package->getJs() as $jsFilename) {
            LibraryHeader::addJsUrl(WebConfig::$webUrl . 'asset/' . $jsFilename);

            /*$js = new JavaScript($this);
            $js->src = '-----'.WebConfig::$webUrl . 'asset/' . $jsFilename;*/

        }

        foreach ($package->getCss() as $css) {
            LibraryHeader::addCssUrl(WebConfig::$webUrl . 'asset/' . $css);

            /*$style = new StylesheetLink($this);
            $style->href = WebConfig::$webUrl . 'asset/' . $css;*/

        }

    }

}