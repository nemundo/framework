<?php

namespace Nemundo\Package\Echarts\Chart;


use Nemundo\Package\Echarts\Data\AbstractChartData;
use Nemundo\Package\Echarts\Data\TwoDimensionData;

class PlotEchart extends AbstractEchart
{


    public $maxValue;

    public $minValue;


    /**
     * @var string
     */
    private $xAxisLabel = '';

    /**
     * @var string
     */
    private $yAxis = '';

    /**
     * @var AbstractChartData[]
     */
    private $dataList = [];

    private $plotData = '';

    public function addXAxisLabel($label)
    {

        $this->xAxisLabel .= '"' . $label . '",';
        return $this;

    }


    /*
    public function addValue($xData, $yData)
    {

        $this->plotData .= '[' . $xData . ',' . $yData . '],';
        return $this;

    }*/


    public function addTwoDimensionData(TwoDimensionData $chartData)
    {

        $this->dataList[] = $chartData;

    }


    public function addData(AbstractChartData $chartData)
    {
        // TODO: Implement addData() method.
    }


    public function getContent()
    {

        $this->script .= '  
        xAxis: {   },
        yAxis: {inverse: true},
        series: [';


        foreach ($this->dataList as $chartData) {
            $this->script .= $chartData->getJavaScript();
        }

        $this->script .= ' ]';


        /*
        {
        data: [' . $this->plotData . '],
        type: "line",
        }]';*/


        return parent::getContent();
    }


}