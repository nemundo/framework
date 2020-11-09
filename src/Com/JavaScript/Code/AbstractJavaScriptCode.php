<?php

namespace Nemundo\Com\JavaScript\Code;


use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\HtmlContainerItem;
use Nemundo\Html\Header\JavaScriptHeaderCode;


abstract class AbstractJavaScriptCode extends JavaScriptHeaderCode  // AbstractContainer
{

    /**
     * @var AbstractJavaScriptCode[]
     */
    protected $codeList = [];


    private $codeLineList = [];

    private $preLineList = [];

    private $afterLineList = [];


    protected function addPreLine($line)
    {

        $this->preLineList[] = $line;

    }


    //protected function addCodeLine($line)
public function addCodeLine($line)
    {

        $this->codeLineList[] = $line;
        return $this;

    }


    protected function addAfterLine($line)
    {
        $this->afterLineList[] = $line;
    }


    public function getContent()
    {


        $html = '';

        $html .= join(PHP_EOL, $this->preLineList).PHP_EOL;
        $html .= join(PHP_EOL, $this->codeLineList).PHP_EOL;

        /*foreach ($this->codeList as $code) {
            $this->addCodeLine($code->getHtml());
        }*/

        //$html .= parent::getContent();
        //$html .= parent::getContent()->headerContent;

        $html .= join(PHP_EOL, $this->afterLineList).PHP_EOL;
$this->addContent($html);


        return parent::getContent();

        /*
        $item = new HtmlContainerItem();
        $item->headerContent=$html;

        return $item;

        //return $html;

        /*
                $this->addHtml(join(PHP_EOL, $this->preLineList));
                $this->addHtml(join(PHP_EOL, $this->codeLineList));

                /*foreach ($this->codeList as $code) {
                    $this->addCodeLine($code->getHtml());
                }

                $this->addHtml(join(PHP_EOL, $this->afterLineList));

                return parent::getHtml();*/

        //return 'code...';


    }


    // addContainer ???
    // Parameter
    public function addCode(AbstractJavaScriptCode $code)
    {
        $this->codeList[] = $code;
        return $this;
    }


}