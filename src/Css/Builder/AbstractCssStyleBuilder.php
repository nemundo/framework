<?php

namespace Nemundo\Css\Builder;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;

abstract class AbstractCssStyleBuilder extends AbstractBase
{

    /*
padding: 8px 12px;
border: 1px solid #1F83FF;*/


    /**
     * @var TextDirectory
     */
    private $styleList;


    public function __construct()
    {

        $this->styleList = new TextDirectory();
    }


    public function addStyle($attribute, $value)
    {

        if ($value !== null) {
            $value = $attribute . ':' . $value . ';';
            $this->styleList->addValue($value);
        }

        return  $this;

    }


    public function getStyle()
    {

        $style = $this->styleList->getText();
        return $style;

    }


}