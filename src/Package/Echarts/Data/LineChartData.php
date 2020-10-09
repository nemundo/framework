<?php

namespace Nemundo\Package\Echarts\Data;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Package\Echarts\Chart\AbstractEchart;
use Nemundo\Package\Echarts\Type\ChartType;
use PhpOffice\PhpSpreadsheet\Chart\Chart;


// LineData
class LineChartData extends AbstractOneDimensionChartData
{

    public function __construct(AbstractEchart $chart)
    {

        parent::__construct($chart);
        $this->chartType = ChartType::LINE;

    }

}