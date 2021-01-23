<?php


namespace Nemundo\App\Translation\Text;


use Nemundo\App\Translation\Data\LargeTextTranslation\LargeTextTranslation;
use Nemundo\App\Translation\Data\LargeTextTranslation\LargeTextTranslationReader;
use Nemundo\App\Translation\Data\Source\Source;
use Nemundo\App\Translation\Data\Source\SourceCount;
use Nemundo\App\Translation\Data\Source\SourceId;
use Nemundo\App\Translation\Data\TextTranslation\TextTranslation;
use Nemundo\App\Translation\Data\TextTranslation\TextTranslationCount;
use Nemundo\App\Translation\Data\TextTranslation\TextTranslationReader;
use Nemundo\App\Translation\Data\TextTranslation\TextTranslationUpdate;
use Nemundo\App\Translation\Session\LanguageSession;
use Nemundo\App\Translation\Type\Source\AbstractSourceType;
use Nemundo\App\Translation\Type\Source\LargeTextSourceType;
use Nemundo\Core\Base\AbstractBase;

class TranslationText extends AbstractBase
{


    public function getSessionText($source, AbstractSourceType $sourceType)
    {


        return $this->getText($source, (new LanguageSession())->getValue(), $sourceType->getId());

    }


    public function getText($source, $languageId, $sourceTypeId)
    {

        $text = '';
        $found = false;

        $reader = new TextTranslationReader();
        $reader->model->loadSource();
        $reader->filter->andEqual($reader->model->languageId, $languageId);
        $reader->filter->andEqual($reader->model->source->source, $source);
        $reader->filter->andEqual($reader->model->source->sourceTypeId, $sourceTypeId);
        foreach ($reader->getData() as $translationRow) {
            $text = $translationRow->text;
            $found = true;
        }

        if (!$found) {

            $data = new TextTranslation();
            $data->languageId = $languageId;
            $data->sourceId = $this->saveSource($source, $sourceTypeId);
            $data->text = '';
            $data->save();

        }

        return $text;

    }





    public function saveTextBySourceId($languageId, $sourceId, $text)
    {

        //$sourceId = $this->saveSource($source, $sourceType->getId());

        $count = new TextTranslationCount();
        $count->filter->andEqual($count->model->languageId, $languageId);
        $count->filter->andEqual($count->model->sourceId, $sourceId);

        if ($count->getCount() == 0) {
            $data = new TextTranslation();
            $data->languageId = $languageId;
            $data->sourceId = $sourceId;
            $data->text = $text;
            $data->save();
        } else {
            $update = new TextTranslationUpdate();
            $update->filter->andEqual($update->model->languageId, $languageId);
            $update->filter->andEqual($update->model->sourceId, $sourceId);
            $update->text = $text;
            $update->update();

        }

        //return $text;


    }




    public function saveText($languageId, $source, AbstractSourceType $sourceType, $text)
    {

        $sourceId = $this->saveSource($source, $sourceType->getId());

        $count = new TextTranslationCount();
        $count->filter->andEqual($count->model->languageId, $languageId);
        $count->filter->andEqual($count->model->sourceId, $sourceId);

        if ($count->getCount() == 0) {
            $data = new TextTranslation();
            $data->languageId = $languageId;
            $data->sourceId = $sourceId;
            $data->text = $text;
            $data->save();
        } else {
            $update = new TextTranslationUpdate();
            $update->filter->andEqual($update->model->languageId, $languageId);
            $update->filter->andEqual($update->model->sourceId, $sourceId);
            $update->text = $text;
            $update->update();

        }

        //return $text;


    }


    public function getLargeText($source)
    {

        $session = new LanguageSession();

        $text = '';

        $found = false;

        $reader = new LargeTextTranslationReader();
        $reader->model->loadSource();
        $reader->filter->andEqual($reader->model->languageId, $session->getValue());
        $reader->filter->andEqual($reader->model->source->source, $source);
        $reader->filter->andEqual($reader->model->source->sourceTypeId, (new LargeTextSourceType())->getId());
        foreach ($reader->getData() as $translationRow) {
            $text = $translationRow->largeText;
            $found = true;
        }


        if (!$found) {

            $data = new LargeTextTranslation();
            $data->languageId = $session->getValue();
            $data->sourceId = $this->saveSource($source, new LargeTextSourceType());
            $data->largeText = '';
            $data->save();

        }

        return $text;

    }


    private function saveSource($source, $sourceTypeId)
    {

        $count = new SourceCount();
        $count->filter->andEqual($count->model->source, $source);
        $count->filter->andEqual($count->model->sourceTypeId, $sourceTypeId);
        if ($count->getCount() == 0) {
            $data = new Source();
            $data->source = $source;
            $data->sourceTypeId = $sourceTypeId;
            $data->save();
        }

        $id = new SourceId();
        $id->filter->andEqual($id->model->source, $source);
        $id->filter->andEqual($id->model->sourceTypeId, $sourceTypeId);
        $sourceId = $id->getId();

        return $sourceId;

    }


}