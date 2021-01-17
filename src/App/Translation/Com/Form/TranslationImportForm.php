<?php


namespace Nemundo\App\Translation\Com\Form;


use Nemundo\App\Translation\Data\Source\SourceReader;
use Nemundo\App\Translation\Language\DefaultLanguage;
use Nemundo\App\Translation\Language\Language;
use Nemundo\App\Translation\Text\TranslationText;
use Nemundo\App\Translation\Type\Source\SourceType;
use Nemundo\Core\Csv\CsvSeperator;
use Nemundo\Core\Csv\Reader\CsvReader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;


class TranslationImportForm extends BootstrapForm
{

    /**
     * @var BootstrapFileUpload
     */
    private $file;

    public function getContent()
    {

        $this->file = new BootstrapFileUpload($this);
        $this->file->label = 'Csv File';
        $this->file->multiUpload = true;
        $this->file->acceptFileType = '.csv';

        return parent::getContent();

    }


    protected function onSubmit()
    {

        foreach ($this->file->getMultiFileRequest() as $fileRequest) {

            $csvReader = new CsvReader();
            //$csvReader->separator = CsvSeperator::COMMA;
            $csvReader->filename = $fileRequest->tmpFileName;

            //(new Debug())->write($csvReader->getHeader());


            //$defaultId = (new DefaultLanguage())->languageId; // getDefaultLanguageId();
            $code = $csvReader->getHeaderByNumber(2);

            (new Debug())->write($code);

            /*
            $id = new LanguageId();
            $id->filter->andEqual($id->model->isoCode, $isoCode);*/
            $languageId = (new Language())->fromCode($code)->languageId;  // $id->getId();


            (new Debug())->write($languageId);

            foreach ($csvReader->getData() as $csvRow) {


                $sourceRow = (new SourceReader())->getRowById($csvRow->getValueByNumber(0));
                $text = $csvRow->getValueByNumber(2);

                (new TranslationText())->saveTextBySourceId($languageId,$sourceRow->id,  $text );



                /*
                $data = new Translation();
              $data->updateOnDuplicate=true;
                $data->languageId = $languageId;
                $data->uniqueId =  $csvRow->getValueByNumber(0);
                $data->text = $csvRow->getValueByNumber(2);
                //$data->translationTypeId = $translationRow->translationTypeId;
                $data->save();*/



                /*
                (new Debug())->write($csvRow->getValueByNumber(1));

                $translationReader = new TranslationReader();
                $translationReader->filter->andEqual($translationReader->model->languageId, $defaultId);
                $translationReader->filter->andEqual($translationReader->model->translation, $csvRow->getValueByNumber(0));
                foreach ($translationReader->getData() as $translationRow) {



                    (new Debug())->write($translationRow->dataId);

                    $count = new TranslationCount();
                    $count->filter->andEqual($count->model->languageId, $languageId);
                    $count->filter->andEqual($count->model->dataId, $translationRow->dataId);
                    if ($count->getCount() == 0) {
                        $data = new Translation();
                        $data->languageId = $languageId;
                        $data->dataId = $translationRow->dataId;
                        $data->translation = $csvRow->getValueByNumber(1);
                        $data->translationTypeId = $translationRow->translationTypeId;
                        $data->save();
                    } else {
                        $update = new TranslationUpdate();
                        $update->filter->andEqual($update->model->languageId, $languageId);
                        $update->filter->andEqual($update->model->translationTypeId, $translationRow->translationTypeId);
                        $update->filter->andEqual($update->model->dataId, $translationRow->dataId);
                        $update->translation = $csvRow->getValueByNumber(1);
                        $update->update();
                    }

                }*/

            }


        }

        (new Debug())->write('Translation Import finished');
        exit;


    }

}