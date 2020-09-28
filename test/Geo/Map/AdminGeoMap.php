<?php

require '../../config.php';

$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

// jqueryready

$map = new \Nemundo\Geo\Map\GeoAdmin\GeoAdminMap($html);

$html->render();

