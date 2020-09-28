<?php

namespace Nemundo\Package\Echarts\Data;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Package\Echarts\Chart\AbstractChart;
use Nemundo\Package\Echarts\Type\ChartType;
use PhpOffice\PhpSpreadsheet\Chart\Chart;


// LineData
abstract class AbstractOneDimensionChartData extends AbstractChartData
{

    /**
     * @var string
     */
    public $legend;


    /**
     * @var TextDirectory
     */
    public $valueList;  // = [];

    /**
     * @var string
     */
    public $chartType;

    /**
     * @var bool
     */
    public $smooth = false;

    public $hideDataPoint = true;


    public function __construct(AbstractChart $chart)
    {

        parent::__construct($chart);
        $this->valueList = new TextDirectory();

    }

    public function addValue($value)
    {

        if ($value ===null) {
            $value='null';
        }

        $this->valueList->addValue($value);
        return $this;

    }


    public function getJavaScript()
    {


        $javaScript = '';

        /*
        smooth:true,
            itemStyle: {normal: {areaStyle: {type: 'default'}}},
*/


        $javaScript .= '
        {
            type:
            "' . $this->chartType . '",';

        if ($this->legend !== null) {
            $javaScript .= 'name: "' . $this->legend . '",';
        }


        //$javaScript .= 'symbol: "none",';



        if ($this->smooth) {
            $javaScript .= 'smooth: true,';
        }

        $javaScript .= 'data: ['.$this->valueList->getTextWithSeperator(',').']
        },';



        /*
        foreach ($this->valueList as $value) {
            $javaScript .= $value . ',';
        }

        $javaScript .= ']
        },
        ';*/

        return $javaScript;

    }


}