<?php

namespace Nemundo\Css\Builder;

class CssStyleBuilder extends AbstractCssStyleBuilder
{

    public $margin;

    public $padding;

    public $width;

    public $color;

    public $backgroundColor;

    public $borderRadius;


    public function getStyle()
    {

        $this
            ->addStyle('margin', $this->margin)
            ->addStyle('padding', $this->padding)
            ->addStyle('width', $this->width)
            ->addStyle('color',$this->color)
            ->addStyle('background',$this->backgroundColor)
            ->addStyle('border-radius',$this->borderRadius)
        ;

        return parent::getStyle();

    }


}