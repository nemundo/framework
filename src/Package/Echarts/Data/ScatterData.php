<?php

namespace Nemundo\Package\Echarts\Data;


use Nemundo\Package\Echarts\Chart\AbstractChart;
use Nemundo\Package\Echarts\Type\ChartType;

class ScatterData extends AbstractOneDimensionChartData
{
    public function __construct(AbstractChart $chart)
    {
        parent::__construct($chart);
        $this->chartType = ChartType::SCATTER;
    }

}