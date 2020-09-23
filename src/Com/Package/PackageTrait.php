<?php

namespace Nemundo\Com\Package;


use Nemundo\Html\Header\LibraryHeader;
use Nemundo\Web\WebConfig;

trait PackageTrait
{

    public function addPackage(AbstractPackage $package)
    {

        foreach ($package->getJs() as $js) {
            LibraryHeader::addJsUrl(WebConfig::$webUrl . 'asset/' . $js);
        }

        foreach ($package->getCss() as $css) {
            LibraryHeader::addCssUrl(WebConfig::$webUrl . 'asset/' . $css);
        }

    }

}