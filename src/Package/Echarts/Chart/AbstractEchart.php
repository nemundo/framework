<?php

namespace Nemundo\Package\Echarts\Chart;


use Nemundo\Com\Package\PackageTrait;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Core\Type\Number\YesNo;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Package\Echarts\Data\AbstractChartData;
use Nemundo\Package\Echarts\Data\LineChartData;
use Nemundo\Package\Echarts\Package\EchartsPackage;

abstract class AbstractEchart extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $chartTitle;

    /**
     * @var int
     */
    public $widthPercent = 100;

    /**
     * @var bool
     */
    public $animation = false;

    /**
     * @var bool
     */
    public $showLegend = true;


    /**
     * @var bool
     */
    public $showTooltip = true;


    //abstract public function addData(AbstractChartData $chartData);

    use PackageTrait;

    /**
     * @var string
     */
    protected $script;


    /**
     * @var LineChartData[]
     */
    private $dataList = [];



    /*
        protected function loadContainer()
        {

            parent::loadContainer();
            $this->addPackage(new EchartsPackage());

        }*/





    public function addData(AbstractChartData $chartData)
    {

        $this->dataList[] = $chartData;
        return $this;

    }


    public function getContent()
    {

        $this->addPackage(new EchartsPackage());

        $chartId = (new UniqueId())->getUniqueId();

        $div = new Div($this);
        $div->id = $chartId;
        $div->addAttribute('style', 'width:' . $this->widthPercent . '%; height:400px;');

        $script = new JavaScript($this);
        $script->addCodeLine('var myChart = echarts.init(document.getElementById("' . $chartId . '"));');
        $script->addCodeLine('var option = {');
        $script->addCodeLine('animation: ' . (new YesNo($this->animation))->getText() . ',');
        $script->addCodeLine('title: {');
        $script->addCodeLine('text: "' . $this->chartTitle . '"');
        $script->addCodeLine('},');

        if ($this->showTooltip) {
        $script->addCodeLine('tooltip: { show: true},');
        }

        if ($this->showLegend) {
            $script->addCodeLine('legend: 
            { show: true, y: "bottom"},
            
            ');
        }

        $script->addCodeLine($this->script);

        $script->addCodeLine('};');
        $script->addCodeLine('myChart.setOption(option);');
        $script->addCodeLine('');

        return parent::getContent();
    }

}