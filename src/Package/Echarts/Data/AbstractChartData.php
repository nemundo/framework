<?php

namespace Nemundo\Package\Echarts\Data;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Package\Echarts\Chart\AbstractEchart;


abstract class AbstractChartData extends AbstractBase
{


    abstract public function getJavaScript();

    public function __construct(AbstractEchart $chart)
    {

        //$this->valueList = new TextDirectory();
        $chart->addData($this);

    }

}