<?php


namespace Nemundo\App\Translation\Type\Source;


use Nemundo\App\Translation\Data\Source\SourceDelete;
use Nemundo\App\Translation\Data\Source\SourceId;
use Nemundo\App\Translation\Data\SourceType\SourceTypeId;
use Nemundo\App\Translation\Data\TextTranslation\TextTranslationDelete;
use Nemundo\App\Translation\Session\LanguageSession;
use Nemundo\App\Translation\Text\TranslationText;
use Nemundo\App\Translation\Type\LanguageType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\AbstractBaseClass;
use Slu3000\Data\Menu\MenuDelete;
use Slu3000\Parameter\MenuParameter;
use Slu3000\Type\Source\MenuSourceType;


// AbstractTranslationType
// AbstractTranslationSourceType
abstract class AbstractSourceType extends AbstractBaseClass
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


    public function getSessionText($source)
    {

        return $this->getText($source, (new LanguageSession())->getValue(), $this->getId());

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



    // deleteTranslation
    public function deleteTranslation($dataId) {

        $id = new SourceId();
        $id->filter->andEqual($id->model->sourceTypeId, $this->getId());
        $id->filter->andEqual($id->model->source, $dataId);
        $sourceId =$id->getId();

        (new SourceDelete())->deleteById($sourceId);


        /*
        $delete=new TextTranslationDelete();
        $delete->filter->andEqual($delete->model->sourceId,$sourceId);
        $delete->delete();
*/


        return $sourceId;

    }




}