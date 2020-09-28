<?php

require '../../config.php';

$html = new \Nemundo\Html\Document\HtmlDocument();


$chart = new \Nemundo\Package\Echarts\Chart\Chart($html);

$data = new \Nemundo\Package\Echarts\Data\ScatterData($chart);
$data->addValue(10,10);
$data->addValue(20,5);
$data->addValue(30,10);


/*
$data = new \Nemundo\Package\Echarts\Data\ChartData($chart);
$data->addValue(10);
$data->addValue(20);
$data->addValue(30);*/


$html->render();

