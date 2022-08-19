<?php

require  "config.php";

$setup = new \Nemundo\Com\Package\PackageSetup();
$setup->destinationPath = (new \Nemundo\Project\Path\WebPath())->getPath();
$setup->addPackage(new \Nemundo\Package\Framework\FrameworkPackage());

