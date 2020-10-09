<?php

namespace Nemundo\Package\Echarts\Data;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Package\Echarts\Chart\PlotEchart;
use Nemundo\Package\Echarts\Type\ChartType;

class TwoDimensionData extends AbstractBase
{

    /**
     * @var string
     */
    public $label;

    public $valueList = [];


    private $plotData = '';

    public function __construct(PlotEchart $chart)
    {

        $chart->addTwoDimensionData($this);
        //  $chart->addoData($this);

    }


    /*
    public function addValue($value)
    {

        $this->valueList[] = $value;
        return $this;

    }*/


    public function addValue($xData, $yData)
    {

        $this->plotData .= '[' . $xData . ',' . $yData . '],';
        return $this;

    }


    public function getJavaScript()
    {


        $javaScript = '';

        /*
        smooth:true,
            itemStyle: {normal: {areaStyle: {type: 'default'}}},

        {
        data: [' . $this->plotData . '],
        type: "line",
        }

*/


        $javaScript .= '
        {
            type:
            "' . ChartType::LINE . '",

            name: "' . $this->label . '",
            data: [' . $this->plotData . ']
        },
        ';

        return $javaScript;

    }


}