<?php

require __DIR__.'/../../../config.php';

$html = new \Nemundo\Html\Document\HtmlDocument();

$googleAnalytics = new \Nemundo\Package\GoogleAnalytics\GoogleAnalyticsContainer($html);
$googleAnalytics->analyticsId = 'G-QP27F04MYY';

$html->render();
