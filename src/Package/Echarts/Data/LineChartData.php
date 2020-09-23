<?php

namespace Nemundo\Package\Echarts\Data;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Package\Echarts\Chart\AbstractChart;
use Nemundo\Package\Echarts\Type\ChartType;
use PhpOffice\PhpSpreadsheet\Chart\Chart;


// LineData
class LineChartData extends AbstractOneDimensionChartData
{

    public function __construct(AbstractChart $chart)
    {

        parent::__construct($chart);
        $this->chartType = ChartType::LINE;

    }

}