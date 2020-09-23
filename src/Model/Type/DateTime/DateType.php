<?php

namespace Nemundo\Model\Type\DateTime;

use Nemundo\Core\Date\DateFormat;
use Nemundo\Model\Form\Item\DateTime\DateModelFormItem;
use Nemundo\Model\Item\DateTime\DateModelItem;
use Nemundo\Model\Type\AbstractModelType;


class DateType extends AbstractModelType
{

    /**
     * @var DateFormat
     */
    //public $defaultDateFormat = DateFormat::SHORT_DATE;


    protected function loadExternalType()
    {

        $this->formTypeClassName = DateModelFormItem::class;
        $this->tableItemClassName = DateModelItem::class;
        $this->viewItemClassName = DateModelItem::class;

    }

}