<?php


namespace Nemundo\App\Translation\Type;


use Nemundo\App\Translation\Data\Language\LanguageReader;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Sql\Order\SortOrder;

class LanguageType extends AbstractBase
{

    public function getLanguageData() {

        $reader = new LanguageReader();
        $reader->addOrder($reader->model->default, SortOrder::DESCENDING);
        $reader->addOrder($reader->model->code);
        return $reader->getData();

    }

}