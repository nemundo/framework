<?php

namespace Nemundo\Package\Echarts\Data;


use Nemundo\Package\Echarts\Chart\AbstractEchart;
use Nemundo\Package\Echarts\Type\ChartType;

class BarChartData extends AbstractOneDimensionChartData
{

    public function __construct(AbstractEchart $chart)
    {
        parent::__construct($chart);

        $this->chartType = ChartType::BAR;

    }

}