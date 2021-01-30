<?php

namespace Nemundo\App\Translation\Site\Export;


use Nemundo\App\Translation\Data\Language\LanguageReader;
use Nemundo\App\Translation\Data\Source\SourceReader;
use Nemundo\App\Translation\Language\DefaultLanguage;
use Nemundo\App\Translation\Text\TranslationText;
use Nemundo\Core\Archive\ZipArchive;
use Nemundo\Core\Csv\Writer\CsvWriter;
use Nemundo\Core\Http\Response\FileResponse;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Web\Site\AbstractSite;

class TranslationExportSite extends AbstractSite
{

    /**
     * @var TranslationExportSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Translation Export';
        $this->url = 'translation-export';
        $this->menuActive = false;
        TranslationExportSite::$site = $this;
    }


    public function loadContent()
    {

        //(new TmpPath())->emptyDirectory();

        $zip = new ZipArchive();
        $zip->archiveFilename = (new TmpPath())
            ->addPath('translation.zip')
            ->getFilename();


        $defaultLanguage = new DefaultLanguage();

        $languageReader = new LanguageReader();
        $languageReader->filter->andNotEqual($languageReader->model->id, $defaultLanguage->languageId);
        foreach ($languageReader->getData() as $languageRow) {

            $filename = (new TmpPath())
                ->addPath($languageRow->code . '.csv')
                ->getFilename();

            $csv = new CsvWriter($filename);
            //$csv->separator=CsvSeperator::COMMA;

            $header = [];
            $header[] = 'id';
            $header[] = $defaultLanguage->code;
            $header[] = $languageRow->code;
            $csv->addRow($header);


            $reader = new SourceReader();
            foreach ($reader->getData() as $sourceRow) {

                $row = [];
                $row[] = $sourceRow->id;
                $row[] = (new TranslationText())->getText($sourceRow->source, (new DefaultLanguage())->getLanguageId(), $sourceRow->sourceTypeId);
                $row[] = (new TranslationText())->getText($sourceRow->source, $languageRow->id, $sourceRow->sourceTypeId);
                $csv->addRow($row);

            }


            /*
            $defaultLanguageTranslationReader = new TranslationReader();
            $defaultLanguageTranslationReader->filter->andEqual($defaultLanguageTranslationReader->model->languageId, $defaultLanguage->languageId);
            //$defaultLanguageTranslationReader->filter->andNotEqual($defaultLanguageTranslationReader->model->translation, '');
            //$defaultLanguageTranslationReader->addOrder($defaultLanguageTranslationReader->model->translation);


            foreach ($defaultLanguageTranslationReader->getData() as $translationRow) {

                $row = [];
                $row[] = $translationRow->uniqueId;
                $row[] = $translationRow->text;

                $translation = '';

                $translationReader = new TranslationReader();
                $translationReader->filter->andEqual($translationReader->model->languageId, $languageRow->id);
                $translationReader->filter->andEqual($translationReader->model->uniqueId, $translationRow->uniqueId);
                foreach ($translationReader->getData() as $translationRow2) {
                    $translation = $translationRow2->text;
                }
                $row[] = $translation;

                $csv->addRow($row);

            }*/

            $csv->closeFile();

            $zip->addFilename($filename);

        }

        $zip->createArchive();

        $response = new FileResponse();
        $response->filename = $zip->archiveFilename;
        $response->sendResponse();


    }


}