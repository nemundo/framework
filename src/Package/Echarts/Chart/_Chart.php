<?php

namespace Nemundo\Package\Echarts\Chart;


use Nemundo\Package\Echarts\Data\AbstractChartData;
use Nemundo\Package\Echarts\Data\LineChartData;


// ChartDiagramm
// Echarts
// LineChart
// EchartsChart
class Chart extends AbstractChart
{




    /**
     * @var int
     */
    public $yMaxValue;

    /**
     * @var int
     */
    public $yMinValue;

    /**
     * @var string
     */
    public $yUnit;

    /**
     * @var string
     */
    public $xUnit;


    /**
     * @var string
     */
    //private $xAxisLabel = '';

    /**
     * @var string
     */
    //private $yAxis = '';

    /**
     * @var LineChartData[]
     */
    //private $dataList = [];

    /*
    public function addXAxisLabel($label)
    {

        $this->xAxisLabel .= '"' . $label . '",';
        return $this;

    }


    public function addData(AbstractChartData $chartData)
    {

        $this->dataList[] = $chartData;
        return $this;

    }


    public function getContent()
    {

        $this->script .= '  
        xAxis: {
        type: "category",
        data: [' . $this->xAxisLabel . ']
    },
        yAxis: {';


        if ($this->yUnit !== null) {
            $this->script .= 'axisLabel : {
        formatter: "{value}' . $this->yUnit . '",
            },';
        }

        if ($this->yMinValue !== null) {
            $this->script .= 'min: ' . $this->yMinValue . ',';
        }

        if ($this->yMaxValue !== null) {
            $this->script .= 'max: ' . $this->yMaxValue . ',';
        }

        $this->script .= '  },
        series: [';

        foreach ($this->dataList as $chartData) {
            $this->script .= $chartData->getJavaScript();
        }

        $this->script .= '
    ],';

        return parent::getContent();

    }*/

}