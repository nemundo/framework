<?php

namespace Nemundo\Package\Echarts\Data;


use Nemundo\Package\Echarts\Chart\AbstractChart;
use Nemundo\Package\Echarts\Type\ChartType;

class BarChartData extends AbstractOneDimensionChartData
{

    public function __construct(AbstractChart $chart)
    {
        parent::__construct($chart);

        $this->chartType = ChartType::BAR;

    }

}