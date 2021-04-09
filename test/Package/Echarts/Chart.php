<?php

require '../../config.php';

$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();

\Nemundo\Com\Html\Header\LibraryHeader::$documentTitle='Echart';

$chart = new \Nemundo\Package\Echarts\Chart\Echart($html);

$data = new \Nemundo\Com\Chart\Data\LineChartData($chart);
$data->addValue(10);
$data->addValue(20);
$data->addValue(30);

$html->render();

