<?php


namespace Nemundo\App\Translation\Type\Source;


use Nemundo\App\Translation\Data\SourceType\SourceTypeId;
use Nemundo\App\Translation\Text\TranslationText;
use Nemundo\App\Translation\Type\LanguageType;
use Nemundo\Core\Base\AbstractBase;


// AbstractTranslationType
// AbstractTranslationSourceType
abstract class AbstractSourceType extends AbstractBase
{

    public $sourceType;


    abstract protected function loadType();

    public function __construct()
    {
        $this->loadType();
    }


    public function getId() {

        $id=new SourceTypeId();
        $id->filter->andEqual($id->model->sourceType,$this->sourceType);
        return $id->getId();

    }



    public function getText($code, $languageId) {


        $text = (new TranslationText())->getText($code,$languageId,$this->getId());
return $text;


    }



    public function getTextList($code) {

        $list=[];

        foreach ((new LanguageType())->getLanguageData() as $languageRow) {
            $list[$languageRow->code]=$this->getText($code,$languageRow->id);
        }

        return $list;


    }


}