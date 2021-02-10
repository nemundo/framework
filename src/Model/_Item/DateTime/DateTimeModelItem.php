<?php

namespace Nemundo\Model\Item\DateTime;


use Nemundo\Core\Date\DateTimeFormat;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Model\Item\AbstractModelItem;
use Nemundo\Model\Type\DateTime\DateTimeType;

class DateTimeModelItem extends AbstractModelItem
{

    /**
     * @var DateTimeType
     */
    public $type;

    public function getContent()
    {

        $dateTime = new DateTime($this->getValue());

        $html = null;
        switch ($this->type->dateTimeFormat) {

            case DateTimeFormat::SHORT_DATE_FORMAT:
                $html = $dateTime->getShortDateLeadingZeroFormat();
                break;

            case DateTimeFormat::SHORT_DATE_TIME_FORMAT:
                $html = $dateTime->getShortDateTimeFormat();
                break;

            case DateTimeFormat::LONG_DATE_FORMAT:
                $html = $dateTime->getLongFormat();
                break;

            default:
                $html = $dateTime->getShortDateTimeLeadingZeroFormat();
        }

        $this->addContent($html);

        return parent::getContent();
    }


}