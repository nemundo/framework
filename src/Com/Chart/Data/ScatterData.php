<?php

namespace Nemundo\Com\Chart\Data;


use Nemundo\Com\Chart\AbstractChart;
use Nemundo\Package\Echarts\Chart\AbstractEchart;


class ScatterData extends AbstractChartData
{

    public function __construct(AbstractChart $chart)
    {
        parent::__construct($chart);
        $this->chartType = ChartType::SCATTER;
    }

}