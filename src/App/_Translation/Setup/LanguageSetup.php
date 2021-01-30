<?php


namespace Nemundo\App\Translation\Setup;


use Nemundo\App\Translation\Data\Language\Language;
use Nemundo\App\Translation\Data\Language\LanguageCount;
use Nemundo\App\Translation\Data\Language\LanguageDelete;
use Nemundo\App\Translation\Data\Language\LanguageUpdate;
use Nemundo\App\Translation\Data\SourceType\SourceType;
use Nemundo\App\Translation\Data\SourceType\SourceTypeCount;
use Nemundo\App\Translation\Data\TextTranslation\TextTranslationDelete;
use Nemundo\App\Translation\Language\AbstractLanguage;
use Nemundo\App\Translation\Type\Source\AbstractSourceType;
use Nemundo\Core\Base\AbstractBase;

class LanguageSetup extends AbstractBase
{


    /*
    public function addSourceType(AbstractSourceType $sourceType)
    {


        $count=new SourceTypeCount();
        $count->filter->andEqual($count->model->sourceType,$sourceType->sourceType);
        if ($count->getCount() == 0) {

        $data = new SourceType();
        //$data->ignoreIfExists = true;
        $data->sourceType = $sourceType->sourceType;
        $data->save();
        }

        return $this;

    }*/


    public function addLanguage(AbstractLanguage $language)
    {

        $count = new LanguageCount();
        $count->filter->andEqual($count->model->code, $language->code);
        if ($count->getCount() == 0) {
            $data = new Language();
            $data->code = $language->code;
            $data->language = $language->language;
            $data->default = $language->defaultLanguage;
            $data->save();
        } else {
            $update = new LanguageUpdate();
            $update->filter->andEqual($update->model->code, $language->code);
            $update->language = $language->language;
            $update->default = $language->defaultLanguage;
            $update->update();
        }

        return $this;

    }


    public function removeLanguage($languageId)
    {

        (new LanguageDelete())->deleteById($languageId);

        $delete = new TextTranslationDelete();
        $delete->filter->andEqual($delete->model->languageId,$languageId);
        $delete->delete();

        return $this;

    }


}