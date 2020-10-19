<?php

namespace Nemundo\Web\Parameter;


use Nemundo\Core\Log\LogMessage;


abstract class AbstractUrlParameterList extends AbstractUrlParameter
{

    /**
     * @var string
     */
    public $parameterName;

    private $valueList = [];


    public function __construct($valueList = [])
    {

        if (!is_array($valueList)) {
            (new LogMessage())->writeError('AbstractMultpleUrlParameter: No valid Array');
        }

        parent::__construct();
        $this->valueList = $valueList;

    }


    public function addValue($value)
    {

        if (!in_array($value, $this->valueList)) {
            $this->valueList[] = $value;
        }


        //$this->valueList =array_unique($this->valueList);
        return $this;

    }


    public function removeValue($value)
    {

        foreach (array_keys($this->valueList, $value) as $key) {
            unset($this->valueList[$key]);
        }

        return $this;

    }


    public function getValueList()
    {

        //$list = array_unique($this->valueList);
        $list = $this->valueList;
        if (isset($_REQUEST[$this->parameterName])) {
            foreach ($_REQUEST[$this->parameterName] as $value) {
                $list[] = trim($value);
            }
        }

        return $list;

    }


    public function hasValue()
    {


        /*$hasValue = true;
        if (isset($_REQUEST[$this->parameterName])) {

            foreach ($_REQUEST[$this->parameterName] as $value) {

                $value = trim($value);

                if (($value == '') || ($value == '0')) {
                    $hasValue = false;
                }

            }

        }*/


        $hasValue= false;

        if (isset($_REQUEST[$this->parameterName])) {

            foreach ($_REQUEST[$this->parameterName] as $value) {

                $value = trim($value);

                if ($value !== '') {     // || ($value == '0')) {
                    $hasValue = true;
                }

            }

        }



        return $hasValue;

    }


    public function getValue()
    {

        (new LogMessage())->writeError('GetValue. Not allowed.');

    }


    public function getUrl()
    {

        $urlList = [];
        foreach ($this->getValueList() as $value) {
            $urlList[] = $this->parameterName . '[]=' . $value;
        }

        $url = '';
        if (sizeof($urlList) > 0) {
            $url = join('&', $urlList);
        }

        return $url;

    }


    public function getJson()
    {

        $json = json_encode($this->getValueList());
        return $json;

    }

}