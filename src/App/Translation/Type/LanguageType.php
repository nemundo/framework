<?php


namespace Nemundo\App\Translation\Type;


use Nemundo\App\Translation\Data\Language\LanguageReader;
use Nemundo\Core\Base\AbstractBase;

class LanguageType extends AbstractBase
{

    public function getLanguageData() {

        $reader = new LanguageReader();
        $reader->addOrder($reader->model->code);
        return $reader->getData();


    }

}